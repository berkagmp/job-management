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
            $table->increments('id');
            $table->string('uid')->unique();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('name', 100);
            $table->string('username', 100);
            $table->string('email');
            $table->string('phone', 20);
            $table->string('password', 200);
            $table->string('remember_token', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('type_id')->index();
            $table->date('date');
            $table->time('time', 0);
            $table->string('location', 255);
            $table->float('price', 15, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('types');
        Schema::dropIfExists('users');
    }
}
