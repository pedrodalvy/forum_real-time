<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Repositories\ThreadsRepository;
use Illuminate\Http\Request;

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
        //
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


    public function update(Request $request, Thread $thread)
    {
        //
    }


    public function destroy(Thread $thread)
    {
        //
    }
}
