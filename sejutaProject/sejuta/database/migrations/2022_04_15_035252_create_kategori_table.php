<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_katdetail')->unsigned();
            // $table->bigInteger('id_ukurandetail')->unsigned();
            // $table->bigInteger('id_genderdetail')->unsigned();
            // $table->bigInteger('id_pemakaidetail')->unsigned();
            $table->enum('kat', ['Kemeja', 'Celana', 'Kaos','Jaket','Lainnya'])->default('Kemeja');
            $table->enum('ukuran', ['S', 'M', 'L','XL','XXL','Lainnya'])->default('S');
            $table->enum('gender', ['Laki-Laki', 'Perempuan'])->default('Laki-Laki');
            $table->enum('pemakai', ['Balita', 'Anak-Anak','Remaja','Dewasa'])->default('Balita');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
