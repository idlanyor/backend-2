<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatAgama extends Model
{
    use HasFactory;
    protected $table = 'cat_agama';
    protected $fillable = ['nama'];
}
