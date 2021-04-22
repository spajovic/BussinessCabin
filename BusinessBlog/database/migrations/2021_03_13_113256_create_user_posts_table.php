<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostsTable extends Migration
{

    public function up()
    {
        Schema::create('user_posts', function (Blueprint $table) {
            $table->id('user_posts_id');
            $table->bigInteger('users_id',false,true);
            $table->bigInteger('posts_id',false,true);
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_posts');
    }
}
