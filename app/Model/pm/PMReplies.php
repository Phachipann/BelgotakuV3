<?php

namespace App\Model\pm;

use Illuminate\Database\Eloquent\Model;

class PMReplies extends Model
{
    protected $table = "pm_replies";

    protected $fillable = ['content', 'pm_id', 'users_id'];
}
