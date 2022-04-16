<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'id_level',
        'nama',
        'jk',
        'username',
        'email',
        'password',
        'alamat',
       'no_hp',
       'foto' 
    ];
}
