<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	/**
	* Lie la table roles au Model
	*/
	protected $table = 'roles';    

	protected $fillable = ['name', 'description'];

	function users(){
		return $this->belongsToMany('App\Model\User', 'users_roles');
	}

	function permissions(){
		return $this->belongsToMany('App\Model\Permissions', 'roles_permissions');
	}
}
