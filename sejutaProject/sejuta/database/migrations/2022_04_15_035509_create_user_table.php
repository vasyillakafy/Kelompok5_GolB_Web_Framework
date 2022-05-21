<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
   
            $table->string('nama','50');
            $table->string('jk','20')->nullable();
            $table->string('email','50')->unique();
            $table->string('password','100');
            $table->string('alamat')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('foto','50')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('user', function ($table){
            $table->string('api_token', '80')->after('password')
            ->unique()
            ->nullable()
            ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
