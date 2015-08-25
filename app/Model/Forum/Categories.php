<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    function topics(){
    	$this->hasMany('App\Model\Forum\Topics');
    }
}
