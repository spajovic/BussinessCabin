<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagsPosts extends Migration
{

    public function up()
    {
        Schema::create('tags_posts',function (Blueprint $table){
            $table->id('tags_posts_id')->autoIncrement();
            $table->bigInteger('tags_id',false,true);
            $table->bigInteger('posts_id',false,true);
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
