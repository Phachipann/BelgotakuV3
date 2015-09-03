<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Badges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('url');
        });

        Schema::create('users_badges', function(Blueprint $table){
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('badges_id')->unsigned();

            $table->foreign('users_id')
                ->references('id')->on('users');

            $table->foreign('badges_id')
                ->references('id')->on('badges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('badges');
        Schema::drop('users_badges');
    }
}
