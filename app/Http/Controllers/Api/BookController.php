<?php

namespace App\Http\Controllers\Api;

use App\Models\Buku;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Resources\BukuResource;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // dapatkan semua buku
        $books = Buku::latest()->paginate(5);
        return new BukuResource(true, 'List Data Buku', $books);
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

        return new BukuResource(true, 'Data buku berhasil ditambahkan', $buku);
    }
    public function show($id)
    {
        $buku = Buku::find($id);
        return new BukuResource(true, 'Detail buku', $buku);
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
        return new BukuResource(true, 'Buku berhasil diupdate', $buku);
    }
    public function destroy($id)
    {
        $buku = Buku::find($id);
        Storage::delete('public/buku/thumbnail' . basename($buku->image));
        $buku->delete();
        return new BukuResource(true, 'Data buku berhasil dihapus', null);
    }
}
