<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BiodataUmum;
use App\Http\Requests\UpdateBiodataUmumRequest;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiodataUmumController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $biodata = BiodataUmum::where('id_pendaftar', $userId)->first();
        return new ApiResource('Sukses', 'Biodata Umum', $biodata);
        // return new BiodataUmumResource($biodata);
    }

    public function create(Request $request)
    {
        // $validator = Validator::make($request->all)
    }

    public function store(Request $request)
    {
        $id = auth()->id();
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|max:16|min:16',
            'jk' => 'required|in:Laki - laki,Perempuan',
            'tmpt_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'addr_prov' => 'required|string',
            'addr_kab' => 'required|string',
            'addr_kec' => 'required|string',
            'addr_des' => 'required|string',
            'addr_dus' => 'required|string',
            'addr_rt' => 'required|string',
            'addr_rw' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $biodata = BiodataUmum::updateOrCreate(
            ['nik' => $request->nik],
            [
                "nama_lengkap" => $request->nama_lengkap,
                "jk" => $request->jk,
                "tmpt_lahir" => $request->tmpt_lahir,
                "tgl_lahir" => $request->tgl_lahir,
                "agama" => $request->agama,
                "kewarganegaraan" => $request->kewarganegaraan,
                "addr_prov" => $request->addr_prov,
                "addr_kab" => $request->addr_kab,
                "addr_kec" => $request->addr_kec,
                "addr_des" => $request->addr_des,
                "addr_rt" => $request->addr_rt,
                "addr_rw" => $request->addr_rw,
                "id_pendaftar" => $id,
            ]
        );

        if ($biodata) {
            return response()->json([
                'success' => true,
                'data' => $biodata
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }


    public function show(BiodataUmum $biodataUmum)
    {
        //
    }

    public function edit(BiodataUmum $biodataUmum)
    {
        //
    }

    public function update(UpdateBiodataUmumRequest $request, BiodataUmum $biodataUmum)
    {
        //
    }

    public function destroy(BiodataUmum $biodataUmum)
    {
        //
    }
}
