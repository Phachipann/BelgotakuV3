<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
	/**
	* Lie la table sections au Model
	*/
	protected $table = 'sections';

	/**
	* Relation sections à la table sections
	*/
	function subForums(){
		return $this->hasMany('App\Model\Forum\Sections');
	}

	function up(){
		return $this->belongsTo('App\Model\Forum\Sections', 'sections_id', 'id');
	}
}
