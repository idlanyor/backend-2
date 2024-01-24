<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // dapatkan semua user
        $users = User::latest()->paginate(5);
        return new ApiResource(true, 'List Data User', $users);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'foto_profil' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/user/thumbnail', $image->hashName());

        //     // create post
        //     $user = User::create([
        //         'nama' => $request->nama,
        //         'foto_profil' => $image->hashName(),
        //         'username' => $request->username,
        //         'password' => bcrypt($request->password),
        //         'jabatan' => $request->jabatan,
        //         'role' => $request->role,
        //     ]);
        // } else {
        $user = User::create([
            'nama' => $request->nama,
            'foto_profil' => 'default-user.png' || NULL,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'jabatan' => $request->jabatan,
            'role' => $request->role,
        ]);
        // }

        return new ApiResource(true, 'Data user berhasil ditambahkan', $user);
    }
    public function show($id)
    {
        $user = User::find($id);
        return new ApiResource(true, 'Detail user', $user);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            // 'foto_profil' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
        ]);
        $id = auth()->id();
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes',
            'username' => 'sometimes|unique:users,username,' . $id,
            'password' => 'sometimes',
            'jabatan' => 'sometimes',
            'role' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }

        $dataToUpdate = [];

        if ($request->filled('nama_lengkap')) {
            $dataToUpdate['nama_lengkap'] = $request->nama_lengkap;
        }

        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request->email;
        }

        if ($request->filled('tgl_lahir')) {
            $dataToUpdate['tgl_lahir'] = $request->tgl_lahir;
        }

        if ($request->filled('password')) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }

        $user->update($dataToUpdate);

        return new ApiResource(true, 'Update data berhasil', $user);
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/user/thumbnail', $image->hashName());

        //     Storage::delete('public/user/thumbnail' . basename($user->image));
        //     // Update user
        //     $user = User::create([
        //         'nama' => $request->nama,
        //         'foto_profil' => $image->hashName(),
        //         'username' => $request->username,
        //         'password' => bcrypt($request->password),
        //         'jabatan' => $request->jabatan,
        //         'role' => $request->role,
        //     ]);
        // } else {
        // $user->update([
        //     'nama' => $request->nama,
        //     'username' => $request->username,
        //     'jabatan' => $request->jabatan,
        //     'role' => $request->role,
        // ]);
        // 'tahun_terbit' => $request->tahun_terbit,
        // }
        // return new ApiResource(true, 'Buku berhasil diupdate', $user);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        // Storage::delete('public/user/thumbnail' . basename($user->image));
        $user->delete();
        return new ApiResource(true, 'Data user berhasil dihapus', null);
    }
}
