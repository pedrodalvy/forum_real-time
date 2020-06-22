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
        return $this->threads::orderBy('updated_at', 'desc')
            ->with('replies')
            ->paginate();
    }

    public function store(array $thread)
    {
        $thread['user_id'] = \Auth::user()->id;
        return $this->threads::create($thread);
    }

    public function update(array $threadData, int $id)
    {
        $thread = self::find($id);

        if (\Auth::user()->can('update', $thread)) {
            $thread->fill($threadData)->update();
            return $thread;
        }

        abort(403, 'Usuário não autorizado.');
    }

    public function find($id)
    {
        return $this->threads::findOrFail($id);
    }
}
