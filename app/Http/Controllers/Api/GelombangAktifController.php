<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GelombangPendaftaran;
use App\Http\Requests\StoreGelombangAktifRequest;
use App\Http\Requests\UpdateGelombangAktifRequest;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GelombangAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gelombang = GelombangPendaftaran::all();
        return new ApiResource(true, 'Gelombang Pendaftaran', $gelombang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gelombang_ke' => 'required|unique:gelombang_pendaftaran,gelombang_ke',
            'isAktif' => 'required',
            'tahun_pelajaran' => 'required',
            'periode_mulai' => 'required',
            'periode_akhir' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'error' => $validator->errors()
                ],
                422
            );
        }
        $gelombang = GelombangPendaftaran::create([
            'gelombang_ke' => $request->gelombang_ke,
            'isAktif' => $request->isAktif,
            'tahun_pelajaran' => $request->tahun_pelajaran,
            'periode_mulai' => $request->periode_mulai,
            'periode_akhir' => $request->periode_akhir
        ]);

        if ($gelombang) {
            return new ApiResource(true, 'Data berhasil ditambahkan', $gelombang);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }
    /**
     * Display the specified resource.
     */
    public function show(GelombangPendaftaran $gelombangAktif, $id)
    {
        $gelombang = GelombangPendaftaran::find($id);
        return new ApiResource(true, "Gelombang dengan ID : $id", $gelombang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GelombangPendaftaran $gelombangAktif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GelombangPendaftaran $gelombangAktif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GelombangPendaftaran $gelombangAktif)
    {
        //
    }
}
