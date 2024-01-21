<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePendaftar extends Model
{
    use HasFactory;
    protected $table = 'file_pendaftar';
    protected $fillable = ['kk', 'ijazah', 'skl', 'pasfoto', 'id_pendaftar'];
    public function pendaftar(){
        return $this->belongsTo(StudentUser::class,'id_pendaftar');
    }
}
