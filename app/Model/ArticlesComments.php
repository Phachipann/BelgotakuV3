<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticlesComments extends Model
{
    protected $table = 'articles_comments';

    protected $fillable = ['comment', 'users_id', 'articles_id'];

    function article(){
    	return $this->belongsTo('App\Model\Articles');
    }

    function user(){
    	return $this->belongsTo('App\Model\User', 'users_id');
    }
}
