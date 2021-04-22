<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPicturesTable extends Migration
{
    public function up()
    {
        Schema::create('user_pictures', function (Blueprint $table) {
            $table->id('user_pictures_id');
            $table->string('filename',140)->default('profilna.jpg');
            $table->foreign('user_pictures_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_pictures');
    }
}
