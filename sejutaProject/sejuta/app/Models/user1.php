<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user1 extends Model
{
    use HasFactory;

    //untuk pengguna yanag butuh barang
    protected $table = 'user';
    protected $guarder = [];
    // protected $fillable = [
    //     'id_level',
    //     'nama',
    //     'jk',
    //     'username',
    //     'email',
    //     'password',
    //     'alamat',
    //    'no_hp',
    //    'foto' 
    // ];
}
