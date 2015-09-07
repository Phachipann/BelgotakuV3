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
            $table->integer('users_id');
            $table->timestamps();
        });

        Schema::create('articles_comments', function(Blueprint $table){
            $table->increments('id');
            $table->string('comment');
            $table->string('user');
            $table->integer('users_id');
            $table->integer('articles_id');
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
        Schema::drop('articles_comments'); 
        Schema::drop('articles');
               
    }
}
