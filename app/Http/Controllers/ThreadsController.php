<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Repositories\ThreadsRepository;
use App\Http\Requests\ThreadsRequest as Request;

class ThreadsController extends Controller
{
    protected $threadRepository;

    public function __construct(ThreadsRepository $threadRepository)
    {
        $this->threadRepository = $threadRepository;
    }


    public function index()
    {
        try {
            $threads = $this->threadRepository->all();
            return response()->json($threads);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function store(Request $request)
    {
        try {
            $thread = $this->threadRepository->store($request->all());
            return response()->json([
                'created' => 'success',
                'data' => $thread,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'created' => 'failed',
                'message' => $e->getMessage(),
            ], 400);
        }
    }


    public function show($id)
    {
        try {
            $thread = $this->threadRepository->find($id);
            return view('threads.view', compact('thread'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function edit($id)
    {
        try {
            $thread = $this->threadRepository->find($id);
            return view('threads.edit', compact('thread'));

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $thread = $this->threadRepository->update($request->all(), $id);
            return redirect()->route('threads.show', $thread->id);

        } catch (\Exception $e) {
            return response()->json([
                'updated' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function destroy(Thread $thread)
    {
        //
    }
}
