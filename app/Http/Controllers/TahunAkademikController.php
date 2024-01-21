<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use App\Http\Requests\StoreTahunAkademikRequest;
use App\Http\Requests\UpdateTahunAkademikRequest;
use App\Http\Resources\ApiResource;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun = TahunAkademik::all();
        return new ApiResource('Sukses', 'Tahun Akademik', $tahun);
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
    public function store(StoreTahunAkademikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAkademik $tahunAkademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAkademik $tahunAkademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTahunAkademikRequest $request, TahunAkademik $tahunAkademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAkademik $tahunAkademik)
    {
        //
    }
}
