<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // dapatkan semua buku
        $books = User::latest()->paginate(5);
        return new UserResource(true, 'List Data User', $books);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'penulis' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'tahun_terbit' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }
        $image = $request->file('image');
        $image->storeAs('public/buku/thumbnail', $image->hashName());

        // create post
        $buku = Buku::create([
            'judul' => $request->judul,
            'thumbnail' => $image->hashName(),
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return new UserResource(true, 'Data buku berhasil ditambahkan', $buku);
    }
    public function show($id)
    {
        $buku = Buku::find($id);
        return new UserResource(true, 'Detail buku', $buku);
    }
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'penulis' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'tahun_terbit' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/buku/thumbnail', $image->hashName());

            Storage::delete('public/buku/thumbnail' . basename($buku->image));
            // Update buku
            $buku->update([
                'judul' => $request->judul,
                'thumbnail' => $image->hashName(),
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
                'tahun_terbit' => $request->tahun_terbit,
            ]);
        } else {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
                'tahun_terbit' => $request->tahun_terbit,
            ]);
        }
        return new UserResource(true, 'Buku berhasil diupdate', $buku);
    }
    public function destroy($id)
    {
        $buku = Buku::find($id);
        Storage::delete('public/buku/thumbnail' . basename($buku->image));
        $buku->delete();
        return new UserResource(true, 'Data buku berhasil dihapus', null);
    }
}
