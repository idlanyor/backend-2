<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\FilePendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FilePendaftarController extends Controller
{
    public function index()
    {
        $id = auth()->id();
        $data = FilePendaftar::where('id_pendaftar', $id)->first();

        if (!$data) {
            return response()->json(['message' => 'File Pendaftar not found'], 404);
        }

        // Ubah path yang disimpan dalam database menjadi URL yang dapat diakses
        return new ApiResource('Sukses', 'File Pendaftar', $data);
    }

    public function store(Request $request)
    {
        $id = auth()->id();
        $validator = Validator::make($request->all(), [
            'kk' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'ijazah' => 'image|mimes:png,jpg,svg,gif,jpeg|max:2048|nullable',
            'skl' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'pasfoto' => 'required|image|mimes:png,jpg,svg,gif,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }
        $kk = $request->file('kk')->storeAs('public/filependaftar/kk', $request->file('kk')->hashName());
        $skl = $request->file('skl')->storeAs('public/filependaftar/skl', $request->file('skl')->hashName());
        $pasfoto = $request->file('pasfoto')->storeAs('public/filependaftar/pasfoto', $request->file('pasfoto')->hashName());

        $fileData = [
            'kk' => str_replace('public/', '', $kk),
            'skl' => str_replace('public/', '', $skl),
            'pasfoto' => str_replace('public/', '', $pasfoto),
            'ijazah' => 'not-uploaded.png',
            'id_pendaftar' => $id
        ];

        if ($request->has('ijazah')) {
            $ijazah = $request->file('ijazah')->storeAs('public/filependaftar/ijazah', $request->file('ijazah')->hashName());
            $fileData['ijazah'] = str_replace('public/', '', $kk);
        }

        $file_pendaftar = FilePendaftar::create($fileData);


        return new ApiResource(true, 'File pendaftar berhasil ditambahkan', $file_pendaftar);
    }

    public function show($id)
    {
        return FilePendaftar::findOrFail($id);
    }

    public function update(Request $request)
    {
        $idPendaftar = auth()->id();

        // Validasi request yang diterima
        $validator = Validator::make($request->all(), [
            'kk' => 'image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'ijazah' => 'image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'skl' => 'image|mimes:png,jpg,svg,gif,jpeg|max:2048',
            'pasfoto' => 'image|mimes:png,jpg,svg,gif,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }

        // Temukan data file pendaftar berdasarkan ID pendaftar
        $filePendaftar = FilePendaftar::where('id_pendaftar', $idPendaftar)->first();

        if (!$filePendaftar) {
            return response()->json(['message' => 'File Pendaftar not found'], 404);
        }

        // Lakukan update parsial jika request memiliki file
        if ($request->hasFile('kk')) {
            $kk = $request->file('kk');
            $kk->storeAs('public/filependaftar/kk', $kk->hashName());
            $filePendaftar->kk = $kk->hashName();
        }

        if ($request->hasFile('ijazah')) {
            $ijazah = $request->file('ijazah');
            $ijazah->storeAs('public/filependaftar/ijazah', $ijazah->hashName());
            $filePendaftar->ijazah = $ijazah->hashName();
        }

        if ($request->hasFile('skl')) {
            $skl = $request->file('skl');
            $skl->storeAs('public/filependaftar/skl', $skl->hashName());
            $filePendaftar->skl = $skl->hashName();
        }

        if ($request->hasFile('pasfoto')) {
            $pasfoto = $request->file('pasfoto');
            $pasfoto->storeAs('public/filependaftar/skl', $pasfoto->hashName());
            $filePendaftar->pasfoto = $pasfoto->hashName();
        }

        // Simpan perubahan pada data file pendaftar
        $filePendaftar->save();

        return new ApiResource(true, 'File pendaftar berhasil diupdate', $filePendaftar);
    }

    public function destroy($id)
    {
        $filePendaftar = FilePendaftar::findOrFail($id);
        $filePendaftar->delete();

        return 204;
    }
}
