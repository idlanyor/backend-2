<?php

namespace App\Http\Controllers;

use App\Models\BiodataUmum;
use App\Http\Requests\StoreBiodataUmumRequest;
use App\Http\Requests\UpdateBiodataUmumRequest;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BiodataUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $biodata = BiodataUmum::where('id_pendaftar', $userId)->get();
        return new ApiResource(true, "Biodata Pendaftar", $biodata);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $validator = Validator::make($request->all)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBiodataUmumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BiodataUmum $biodataUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BiodataUmum $biodataUmum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBiodataUmumRequest $request, BiodataUmum $biodataUmum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiodataUmum $biodataUmum)
    {
        //
    }
}
