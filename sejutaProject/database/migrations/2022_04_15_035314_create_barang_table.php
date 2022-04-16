<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('nama_barang','50');
            $table->string('deskripsi');
            $table->Integer('jumlah');
            $table->string('foto','100');
            $table->timestamps();
        });
        Schema::table('barang', function (Blueprint $table){
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
           
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
