<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Create a new TaskService instance.
     *
     * @return void
     */
    public function __construct(TaskService $task_service)
    {
        $this->task_service = $task_service;
        $this->middleware('user_role:manager', ['except' => ['index']]);

    }

    /**
     * Get all tasks.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $auth_user = auth()->user();

        if($auth_user->role->name == 'employee'){
            $tasks = $this->task_service->getByUserId($auth_user->id);
        }else{
            $tasks = $this->task_service->all();
        }


        return response()->json([
            'status' => true,
            'datas' => $tasks
        ],200);

    }

    /**
     * Store task.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->task_service->store(auth()->user()->id,$request['name'],$request['description'],$request['employee_id']);

        return response()->json([
            'status' => true,
            'task' => $task
        ],200);

    }

     /**
     * destroy task.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($product_id)
    {
        $this->task_service->destroyById($product_id);

        return response()->json([
            'status' => true,
            'message' => 'Task destroyed successfully',
        ],200);

    }

    /**
     * Get employee tasks.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function getEmployeeTasks()
    // {
    //     $tasks = $this->task_service->getByUserId(auth()->user()->id);

    //     return response()->json([
    //         'status' => true,
    //         'tasks' => $tasks
    //     ],200);

    // }
}
