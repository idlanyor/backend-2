<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GelombangPendaftaran;
use App\Models\StudentUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            "jabatan" => $request->jabatan,
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
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            "nama_lengkap" => "required",
            "email" => "required|email|unique:student_users",
            "tgl_lahir" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $q = GelombangPendaftaran::query();
        $q->where('isAktif', 1);
        $gelombang_aktif = $q->pluck('gelombang_ke');
        $passw = Carbon::createFromFormat('Y-m-d',$request->tgl_lahir)->format('dmY');
        $user = StudentUser::create([
            "nama_lengkap" => $request->nama_lengkap,
            "nik" => $request->nik,
            "email" => $request->email,
            "tgl_lahir" => $request->tgl_lahir,
            "password" => bcrypt($passw),
            "status" => 0,
            "gelombang" => $gelombang_aktif[0],
            'tgl_daftar' => now()->toDateString()
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
