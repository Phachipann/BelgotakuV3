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

    function section(){
    	return $this->belongsTo('App\Model\Forum\Sections');
    }
}
