<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = [
        'judul',
        'thumbnail',
        'penulis',
        'penerbit',
        'deskripsi',
        'tahun_terbit'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/buku/thumbnail/' . $image)
        );
    }
}
