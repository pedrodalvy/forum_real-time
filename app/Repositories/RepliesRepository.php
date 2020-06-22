<?php


namespace App\Repositories;


use App\Models\Reply;
use Auth;

class RepliesRepository
{
    protected $replies;

    public function __construct(Reply $replies)
    {
        $this->replies = $replies;
    }

    public function showRepliesByThread($id)
    {
        return $this->replies::where('thread_id', $id)
            ->with('user')
            ->with('thread')
            ->get();
    }

    public function store(array $replie)
    {
        $replie['user_id'] = Auth::user()->id;
        return $this->replies::create($replie);
    }
}
