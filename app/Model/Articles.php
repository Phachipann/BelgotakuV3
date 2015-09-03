<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
	protected $table = 'articles';

	protected $fillable = ['title', 'slug', 'content', 'users_id'];

	function comments(){
		return $this->hasMany('App\Model\ArticlesComments');
	}    
}
