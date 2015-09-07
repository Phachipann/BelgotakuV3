<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Crée la table sections
        Schema::create('sections', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->integer('priority')->nullable();
            $table->integer('sections_id')->nullable();
            $table->timestamps();
        });

        //Crée la table topics
        Schema::create('topics', function(Blueprint $table){
            $table->increments('id');
            $table->string('subject');
            $table->string('slug');
            $table->integer('users_id');
            $table->integer('sections_id');
            $table->string('last_user');
            $table->integer('last_reply_id')->nullable();
            $table->boolean('is_locked');
            $table->boolean('is_pinned');
            $table->timestamps();           
        });

        //Crée la table replies
        Schema::create('replies', function(Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->integer('topics_id');
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
        Schema::drop('replies');
        Schema::drop('topics');
        Schema::drop('sections');
    }
}
