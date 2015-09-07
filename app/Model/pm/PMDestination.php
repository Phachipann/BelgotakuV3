<?php

namespace App\Model\pm;

use Illuminate\Database\Eloquent\Model;

class PMDestination extends Model
{
    protected $table = 'pm_destination';

    protected $fillable = ['pm_id', 'users_id'];

    function user(){
    	return $this->belongsTo('App\Model\User', 'users_id', 'id');
    }

    function pm(){
    	return $this->belongsTo('App\Model\pm\PrivateMessage', 'pm_id');
    }
}
