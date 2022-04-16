<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_level')->unsigned();
            $table->string('nama','50');
            $table->string('jk','20');
            $table->string('username','50')->unique();
            $table->string('email','100');
            $table->string('password','15');
            $table->string('alamat');
            $table->bigInteger('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
     
            $table->timestamps();
        });

        Schema::table('admin', function (Blueprint $table){
            $table->foreign('id_level')->references('id')->on('level')->onDelete('cascade')->onUpdate('cascade');
           
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
