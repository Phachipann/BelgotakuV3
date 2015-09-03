<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
	/**
	* Lie la table replies au Model
	*/
    protected $table = 'replies';

    protected $fillable = ['content', 'topics_id', 'users_id'];

    function topic(){
    	return $this->belongsTo('App\Model\Forum\Topics', 'topics_id');
    }

    function user(){
    	return $this->belongsTo('App\Model\User', 'users_id', 'id');
    }
}
