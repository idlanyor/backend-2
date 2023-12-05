<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginPanel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => "required",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only("email", "password");
        if (!$token = auth()->guard('panel')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'Username dan Password tidak sesuai'
            ], 401);
        }
        return response()->json([
            'success' => true,
            'user' => auth()->guard('panel')->user(),
            'token' => $token
        ], 200);
    }
    public function loginPendaftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => "required",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only("username", "password");
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
