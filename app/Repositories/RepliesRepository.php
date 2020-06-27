<?php


namespace App\Repositories;


use App\Events\NewReply;
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

    public function store(array $reply)
    {
        $reply['user_id'] = Auth::user()->id;
        $newReply = $this->replies::create($reply);

        event(new NewReply($newReply));

        return $newReply;
    }
}
