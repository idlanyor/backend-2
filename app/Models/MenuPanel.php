<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPanel extends Model
{
    use HasFactory;
    protected $table = 'menu_panel';
    protected $fillable = ['nama_menu', 'url', 'user_role'];
}
