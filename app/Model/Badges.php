<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    protected $table = 'badges';

    protected $fillable = ['name', 'slug', 'description', 'url'];

    public function users(){
    	return $this->belongsToMany('App\Model\User', 'users_badges', 'badges_id', 'users_id');
    }
}
