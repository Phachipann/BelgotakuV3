<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    /**
    * Lie la table permissions au Model
    */
    protected $table = 'permissions';

    function roles(){
    	return $this->belongsToMany('App\Model\Roles', 'roles_permissions');
    }
}
