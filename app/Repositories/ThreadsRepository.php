<?php


namespace App\Repositories;


use App\Models\Thread;

class ThreadsRepository
{
    protected $threads;

    public function __construct(Thread $thread)
    {
        $this->threads = $thread;
    }

    public function all()
    {
        return $this->threads::orderBy('updated_at', 'desc')->with('replies')->paginate();
    }

    public function find($id)
    {
        return $this->threads::findOrFail($id);
    }
}
