<?php

namespace App\Model\pm;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $table = 'pm_title';

    protected $fillable = ['subject', 'slug', 'users_id'];

    function user(){
    	return $this->belongsTo('App\Model\User', 'users_id');
    }

    function replies(){
    	return $this->hasMany('App\Model\pm\PMReplies', 'pm_id');
    }

    function toUsers(){
    	return $this->belongsToMany('App\Model\pm\PMReplies', 'pm_destination', 'pm_id', 'users_id');
    }
}
