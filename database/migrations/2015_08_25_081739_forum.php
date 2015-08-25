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
            $table->timestamps();
        });

        //Crée la table catégories
        Schema::create('categories', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('priority');
            $table->integer('sections_id')->unsigned();
            $table->timestamps();

            $table->foreign('sections_id')
                ->references('id')->on('sections');
        });

        //Crée la table sub_categories
        Schema::create('sub_categories', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('priority');
            $table->integer('categories_id')->unsigned();
            $table->timestamps();

            $table->foreign('categories_id')
                ->references('id')->on('categories');
        });

        //Crée la table topics
        Schema::create('topics', function(Blueprint $table){
            $table->increments('id');
            $table->string('subject');
            $table->string('slug');
            $table->integer('users_id')->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->timestamps();

            $table->foreign('categories_id')
                ->references('id')->on('categories');

            $table->foreign('users_id')
                ->references('id')->on('users');
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
        Schema::drop('sub_categories');
        Schema::drop('categories');
        Schema::drop('sections');
    }
}
