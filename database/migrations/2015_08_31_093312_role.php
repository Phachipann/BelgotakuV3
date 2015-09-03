<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
        });

        Schema::create('users_roles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('roles_id')->unsigned();

            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('roles_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');
        });

        Schema::create('roles_permissions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('roles_id')->unsigned();
            $table->integer('sections_id')->unsigned();
            $table->boolean('create');
            $table->boolean('read');
            $table->boolean('update');
            $table->boolean('delete');

            $table->foreign('roles_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->foreign('sections_id')
                ->references('id')->on('sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
        Schema::drop('users_roles');
        Schema::drop('roles_permissions');
    }
}
