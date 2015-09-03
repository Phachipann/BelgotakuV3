<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('content');
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')->on('users');
        });

        Schema::create('articles_comments', function(Blueprint $table){
            $table->increments('id');
            $table->string('comment');
            $table->integer('users_id')->unsigned();
            $table->integer('articles_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')->on('users');

            $table->foreign('articles_id')
                ->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
        Schema::drop('articles_comments');        
    }
}
