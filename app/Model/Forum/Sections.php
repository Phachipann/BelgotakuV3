<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
	protected $table = 'sections';

	function categories(){
		return $this->hasMany('App\Model\Forum\Categories');
	}
}
