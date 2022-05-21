<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('id_user')->unsigned();
         
            $table->string('foto_paket','50');
            $table->date('tgl_kirim');
            $table->date('tgl_terima');
            $table->enum('status', ['belum diproses', 'diproses','dikirim','selesai'])->default('belum diproses');
            $table->timestamps();
        });
        Schema::table('transaksi', function (Blueprint $table){
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
