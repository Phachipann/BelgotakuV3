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
            $table->string('priority');
            $table->integer('sections_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('sections_id')
                ->references('id')->on('sections');
        });

        //Crée la table topics
        Schema::create('topics', function(Blueprint $table){
            $table->increments('id');
            $table->string('subject');
            $table->string('slug');
            $table->integer('users_id')->unsigned();
            $table->integer('sections_id')->unsigned();
            $table->integer('last_users_id');
            $table->integer('last_replies_id');
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')->on('users');

            $table->foreign('sections_id')
                ->references('id')->on('sections');            
        });

        //Crée la table replies
        Schema::create('replies', function(Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->integer('topics_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('topics_id')
                ->references('id')->on('topics');

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
        Schema::drop('replies');
        Schema::drop('topics');
        Schema::drop('sections');
    }
}
