<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class barang extends Model
{
    use HasFactory;
protected $table = 'barang';
protected $fillable = [
    'id_kategori',
    'id_users',
    'nama_barang',
    'jumlah',
    'deskripsi',
    'foto',
    
    

];

    public function kategori(){
        
        // return $this->belongsTo('App\Models\buku');

        return $this->hasOne(kategori::class,'id','id_kategori');
    }
    public function user(){
        
        // return $this->belongsTo('App\Models\buku');

        return $this->hasOne(User::class,'id','id_users');
    }
   
}
