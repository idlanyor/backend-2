<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataUmum extends Model
{
    use HasFactory;
    protected $table = 'pd_biodata_umum';
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'jk',
        'tmpt_lahir',
        'tgl_lahir',
        'agama',
        'kewarganegaraan',
        'addr_prov',
        'addr_kab',
        'addr_kec',
        'addr_des',
        'addr_rt',
        'addr_rw',
        'id_pendaftar'

    ];
}
