<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataUmum extends Model
{
    use HasFactory;
    protected $table = 'biodata_umum';
    protected $fillable = [
        'asal_sekolah',
        'nisn',
        'nm_bapak',
        'nm_ibu',
        'pkj_ayah',
        'pkj_ibu',
        'pengh_ayah',
        'pengh_ibu',
        'pend_t_ayah',
        'pend_t_ibu',
        'id_pendaftar'
    ];
    public function pkjAyah(){
        return $this->belongsTo('');
    }

}
