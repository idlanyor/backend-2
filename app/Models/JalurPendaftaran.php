<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'jalur_pendaftaran';
    protected $fillable = [
        'nama_jalur',
        'kuota',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function jadwalJalurPendaftaran()
    {
        return $this->hasMany(JadwalJalurPendaftaran::class, 'id_jalur');
    }
}
