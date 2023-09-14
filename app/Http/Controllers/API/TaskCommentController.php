<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TaskCommentService;
use App\Http\Requests\TaskCommentStoreRequest;

class TaskCommentController extends Controller
{
    /**
     * Create a new TaskCommentService instance.
     *
     * @return void
     */
    public function __construct(TaskCommentService $task_comment_service)
    {
        $this->task_comment_service = $task_comment_service;
    }

    /**
     * Store task comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskCommentStoreRequest $request){
        $task_comment = $this->task_comment_service->store(auth()->user()->id,$request['text'],$request['task_id']);

        return response()->json([
            'status' => true,
            'task_comment' => $task_comment
        ],201);
    }
}
