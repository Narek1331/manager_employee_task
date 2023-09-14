<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\TaskStatusEditRequest;

class TaskStatusController extends Controller
{
    /**
     * Create a new TaskService instance.
     *
     * @return void
     */
    public function __construct(TaskService $task_service)
    {
        $this->task_service = $task_service;
    }

    /**
     * Store task comment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(TaskStatusEditRequest $request){
        $task_status = $this->task_service->editStatus($request['task_id'],$request['status_id']);

        return response()->json([
            'status' => true,
            'task_status' => $task_status
        ],200);
    }
}
