<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopicView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_topic_read', function(Blueprint $table){
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('topics_id');
            $table->timestamps();
        });

        Schema::create('topic_views', function(Blueprint $table){
            $table->increments('id');
            $table->integer('topics_id');
            $table->integer('views');
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
        Schema::drop('users_topic_read');
        Schema::drop('topic_views');
    }
}
