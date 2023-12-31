<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\BiodataUmum;
use App\Models\StudentUser;
use App\Models\TahapanProsesPendaftar;
use Illuminate\Http\Request;

class StudentUserController extends Controller
{
    public function index()
    {
        // dapatkan semua user
        $id = auth()->id();
        $students = StudentUser::find($id);
        return new ApiResource(true, 'Informasi User :', $students);
    }
    public function tabelProsesPendaftaran()
    {
        $userId = auth()->id();
        $data = TahapanProsesPendaftar::where('user_id', $userId)
            ->join('tahapan_proses', 'tahapan_proses_pendaftar.id_tahapan_proses', '=', 'tahapan_proses.id')
            ->select('tahapan_proses_pendaftar.id', 'tahapan_proses_pendaftar.user_id', 'tahapan_proses.id as tahapan_id', 'tahapan_proses.proses as nama_tahapan_proses', 'tahapan_proses_pendaftar.status')
            ->get();
        return new ApiResource(true, 'Tahapan Proses Pendaftaran :', $data);
    }
    public function getBiodataPendaftar()
    {
        $userId = auth()->id();
        $biodata = BiodataUmum::where('id_pendaftar', $userId)->get();
        return new ApiResource(true, "Biodata Pendaftar", $biodata);
    }
    public function updateDataPendaftar(Request $request)
    {
        $id = auth()->id();
        $user = StudentUser::find($id);
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'sometimes',
            'email' => 'sometimes|unique:pd_users,email,' . $id,
            'tgl_lahir' => 'sometimes',
            'password' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 422);
        }

        $dataToUpdate = [];

        if ($request->filled('nama_lengkap')) {
            $dataToUpdate['nama_lengkap'] = $request->nama_lengkap;
        }

        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request->email;
        }

        if ($request->filled('tgl_lahir')) {
            $dataToUpdate['tgl_lahir'] = $request->tgl_lahir;
        }

        if ($request->filled('password')) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }

        $user->update($dataToUpdate);

        return new ApiResource(true, 'Update data berhasil', $user);
    }
}
