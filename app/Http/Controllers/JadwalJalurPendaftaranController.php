<?php

namespace App\Http\Controllers;

use App\Models\JadwalJalurPendaftaran;
use App\Http\Requests\StoreJadwalJalurPendaftaranRequest;
use App\Http\Requests\UpdateJadwalJalurPendaftaranRequest;
use App\Http\Resources\ApiResource;

class JadwalJalurPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = JadwalJalurPendaftaran::all();
        return new ApiResource('Sukses', "Jadwal Jalur Pendaftaran", $jadwal);
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
    public function store(StoreJadwalJalurPendaftaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalJalurPendaftaran $jadwalJalurPendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalJalurPendaftaran $jadwalJalurPendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalJalurPendaftaranRequest $request, JadwalJalurPendaftaran $jadwalJalurPendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalJalurPendaftaran $jadwalJalurPendaftaran)
    {
        //
    }
}
