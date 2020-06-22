<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'title', 'body', 'thread_id', 'user_id'
    ];
}
