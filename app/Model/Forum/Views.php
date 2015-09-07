<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    protected $table = 'topic_views';

    protected $fillable = ['topics_id', 'views'];
}
