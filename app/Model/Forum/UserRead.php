<?php

namespace App\Model\Forum;

use Illuminate\Database\Eloquent\Model;

class UserRead extends Model
{
    protected $table = 'users_topic_read';

    protected $fillable = ['users_id', 'topics_id'];
}
