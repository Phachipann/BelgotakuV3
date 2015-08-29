<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
	/**
	* Lie la table topics au Model
	*/
	protected $table = 'topics';

	protected $fillable = ['subject', 'slug', 'users_id', 'sections_id', 'last_users_id', 'last_replies_id'];

	/**
	* Relation topics à la table replies
	*/
	function replies(){
		return $this->hasMany('App\Model\Forum\Replies');
	}

	function user(){
		return $this->belongsTo('App\Model\User');
	}

	function section(){
		return $this->belongsTo('App\Model\Forum\Sections', 'sections_id', 'id');
	}
}
