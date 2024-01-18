<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_ajaran';
    protected $fillable = [
        'tahun_ajaran', 'mulai', 'akhir'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    use HasFactory;
}
