<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    function roles(){
        return $this->belongsToMany('App\Model\Roles', 'users_roles');
    }

    function topics(){
        return $this->hasMany('App\Model\Forum\Topics', 'users_id');
    }

    function messages(){
        return $this->hasMany('App\Model\Forum\Replies', 'users_id');
    }

    function badges(){
        return $this->belongsToMany('App\Model\Badges', 'users_badges', 'users_id', 'badges_id');
    }

    function pm(){
        return $this->belongsToMany('App\Model\pm\PrivateMessage', 'pm_destination', 'users_id', 'pm_id');
    }
}
