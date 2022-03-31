<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;
    protected $tabel="petugas";
    protected $fillable = ['nama_petugas', 'jk', 'alamat','no_telp', 'email' , 'username',
    'password' ,  'level_id' ];   
}
