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
            $table->integer('users_id');
            $table->string('last_user');
            $table->integer('last_reply')->nullable();
            $table->timestamps();
        });

        Schema::create('pm_replies', function(Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->integer('pm_id');
            $table->integer('users_id');
            $table->timestamps();
        });

        Schema::create('pm_destination', function(Blueprint $table){
            $table->increments('id');
            $table->integer('pm_id');
            $table->integer('users_id');
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
        Schema::drop('pm_destination');
        Schema::drop('pm_replies');
        Schema::drop('pm_title');
    }
}
