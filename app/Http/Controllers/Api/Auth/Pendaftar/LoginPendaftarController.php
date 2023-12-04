<?php

namespace App\Http\Controllers\Api\Auth\Pendaftar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginPendaftarController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only("email", "password");
        if (!$token = auth()->guard('pendaftar')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'Email dan Password tidak sesuai'
            ], 401);
        }
        return response()->json([
            'success' => true,
            'user' => auth()->guard('pendaftar')->user(),
            'token' => $token
        ], 200);
    }
}
