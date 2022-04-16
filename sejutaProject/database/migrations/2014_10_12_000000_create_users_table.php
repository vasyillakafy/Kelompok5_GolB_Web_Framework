<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('id_level')->unsigned();
            $table->string('nama','50');
            $table->string('jk','20');
            $table->string('username','50')->unique();
            $table->string('email','100');
            $table->string('password');
            $table->string('alamat');
            $table->bigInteger('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
