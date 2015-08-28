<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
	/**
	* Lie la table topics au Model
	*/
	protected $table = 'topics';

	protected $fillable = ['subject', 'slug', 'users_id', 'categories_id', 'last_user_id', 'last_reply_id'];

	/**
	* Relation topics à la table replies
	*/
	function replies(){
		return $this->hasMany('App\Model\Forum\Replies');
	}    
}
