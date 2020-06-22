<?php

namespace App\Http\Controllers;

use App\Repositories\RepliesRepository;

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
            return $replies->toArray();

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
