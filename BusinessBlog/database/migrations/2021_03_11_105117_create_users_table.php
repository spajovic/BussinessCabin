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
            $table->id('users_id');
            $table->string('name',21);
            $table->string('surname',21);
            $table->string('email',120);
            $table->string('password',60);
            $table->bigInteger('roles_id',false,true)->default('1');
            $table->foreign('roles_id')->references('roles_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
