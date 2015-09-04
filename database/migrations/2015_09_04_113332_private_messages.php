<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrivateMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_title', function(Blueprint $table){
            $table->increments('id');
            $table->string('subject');
            $table->string('slug');
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')->on('users');
        });

        Schema::create('pm_replies', function(Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->integer('pm_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('pm_id')
                ->references('id')->on('pm_title');

            $table->foreign('users_id')
                ->references('id')->on('users');
        });

        Schema::create('pm_destination', function(Blueprint $table){
            $table->increments('id');
            $table->integer('pm_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('pm_id')
                ->references('id')->on('pm_title');

            $table->foreign('users_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pm_destination');
        Schema::drop('pm_replies');
        Schema::drop('pm_title');
        
        
    }
}
