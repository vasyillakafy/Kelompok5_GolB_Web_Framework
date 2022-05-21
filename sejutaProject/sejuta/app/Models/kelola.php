<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelola extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = [];

    //relasi hasone ke tabel user
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'id_users');
    }

    //buatkan relasi hasone ke tabel barang
    public function barang()
    {
        return $this->hasOne(barang::class, 'id', 'id_barang');
    }

    //buatkan relasi hasone ke tabel user
    public function user()
    {
        return $this->hasOne(users::class, 'id', 'id_user');
    }
}
