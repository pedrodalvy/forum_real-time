<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $appends = ['links'];

    protected $fillable = [
        'body', 'thread_id', 'user_id'
    ];

    public function getLinksAttribute()
    {
        return [
            'href' => route('threads.show', $this->id),
            'rel' => 'Exibir Tópico'
        ];
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
