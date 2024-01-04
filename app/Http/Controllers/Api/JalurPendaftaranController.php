<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JalurPendaftaran;
use App\Http\Requests\StoreJalurPendaftaranRequest;
use App\Http\Requests\UpdateJalurPendaftaranRequest;

class JalurPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jalurPendaftaran = JalurPendaftaran::with('jadwalJalurPendaftaran')->get();

        return response()->json($jalurPendaftaran, 200);
    }

    public function show($id)
    {
        $jalurPendaftaran = JalurPendaftaran::with('jadwalJalurPendaftaran')->findOrFail($id);

        return response()->json($jalurPendaftaran, 200);
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
    public function store(StoreJalurPendaftaranRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJalurPendaftaranRequest $request, JalurPendaftaran $jalurPendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JalurPendaftaran $jalurPendaftaran)
    {
        //
    }
}
