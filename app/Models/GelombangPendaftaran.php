<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GelombangPendaftaran extends Model
{
    use HasFactory;
    protected $table = "gelombang_pendaftaran";
    protected $fillable = [
        "gelombang_ke",
        "isAktif",
        "tahun_pelajaran",
        "periode_gelombang",
    ];
}
