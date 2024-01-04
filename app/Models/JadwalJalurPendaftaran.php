<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalJalurPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'jadwal_jalur_pendaftaran';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
