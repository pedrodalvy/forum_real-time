<?php

namespace App\Http\Controllers;

use App\Repositories\RepliesRepository;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    protected $repliesRepository;

    public function __construct(RepliesRepository $repliesRepository)
    {
        $this->repliesRepository = $repliesRepository;
    }

    public function show($id)
    {
        try {
            $replies = $this->repliesRepository->showRepliesByThread($id);
            return response()->json($replies);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $replie = $this->repliesRepository->store($request->all());
            return response()->json([
                'created' => 'success',
                'data' => $replie,
            ], 200);

        }  catch (\Exception $e) {
            return response()->json([
                'created' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
