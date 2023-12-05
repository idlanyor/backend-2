<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GelombangPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function registerPanel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "username" => "required|unique:users",
            "jabatan" => "required",
            "password" => "required|min:8",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => $request->jabatan,
            "role" => 2,
            "password" => bcrypt($request->password),
        ]);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }
    public function registerPendaftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => "required",
            "email" => "required|email|unique:users",
            "tgl_lahir" => "required",
            "password" => "required|min:8",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $gelombang_aktif = GelombangPendaftaran::where('isAktif', 1)->first;
        $user = User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "email" => $request->email,
            "tgl_lahir" => $request->tgl_lahir,
            "password" => bcrypt($request->password),
            "status" => 0,
            "gelombang" => $gelombang_aktif->gelombang_ke,
            'tgl_daftar' => now(),
        ]);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }
}
