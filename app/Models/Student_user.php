<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_user extends Model
{
    use HasFactory;
    protected $fillable = [
    "nama_lengkap",
    "email",
    "tgl_lahir",
    "status",
    "tgl_diterima",
    "gelombang",
    "password",
    ];
}
