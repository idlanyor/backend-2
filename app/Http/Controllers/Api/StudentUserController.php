<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\StudentUser;
use App\Models\TahapanProsesPendaftar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentUserController extends Controller
{
    public function index()
    {
        // dapatkan semua user
        $id = auth()->id();
        $students = StudentUser::find($id);
        return new ApiResource(true, 'Informasi User :', $students);
    }
    public function tabelProsesPendaftaran()
    {
        $userId = auth()->id();
        $data = TahapanProsesPendaftar::where('user_id', $userId)
        ->join('tahapan_proses', 'tahapan_proses_pendaftar.id_tahapan_proses', '=', 'tahapan_proses.id')
        ->select('tahapan_proses_pendaftar.id', 'tahapan_proses_pendaftar.user_id', 'tahapan_proses.id as tahapan_id', 'tahapan_proses.proses as nama_tahapan_proses', 'tahapan_proses_pendaftar.status')
        ->get();
        return new ApiResource(true, 'Tahapan Proses Pendaftaran :', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'foto_profil' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/user/thumbnail', $image->hashName());

            // create post
            $user = StudentUser::create([
                'nama' => $request->nama,
                'foto_profil' => $image->hashName(),
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'jabatan' => $request->jabatan,
                'role' => $request->role,
            ]);
        } else {
            $user = StudentUser::create([
                'nama' => $request->nama,
                'foto_profil' => 'default-user.png' || NULL,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'jabatan' => $request->jabatan,
                'role' => $request->role,
            ]);
        }

        return new ApiResource(true, 'Data user berhasil ditambahkan', $user);
    }
    public function show($id)
    {
        $user = StudentUser::find($id);
        return new ApiResource(true, 'Detail user', $user);
    }
    public function update(Request $request, $id)
    {
        $user = StudentUser::find($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'foto_profil' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/user/thumbnail', $image->hashName());

            Storage::delete('public/user/thumbnail' . basename($user->image));
            // Update user
            $user = StudentUser::create([
                'nama' => $request->nama,
                'foto_profil' => $image->hashName(),
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'jabatan' => $request->jabatan,
                'role' => $request->role,
            ]);
        } else {
            $user->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
                'tahun_terbit' => $request->tahun_terbit,
            ]);
        }
        return new ApiResource(true, 'Buku berhasil diupdate', $user);
    }
    public function destroy($id)
    {
        $user = StudentUser::find($id);
        Storage::delete('public/user/thumbnail' . basename($user->image));
        $user->delete();
        return new ApiResource(true, 'Data user berhasil dihapus', null);
    }
}
