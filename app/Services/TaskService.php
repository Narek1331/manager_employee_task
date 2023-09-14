<?php
namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskService{

    /**
     * Get all tasks.
     */
    public function all(){
        return Task::with(['owner','employee','comments','status'])->get();
    }

    /**
     * Create task.
     */
    public function store($user_id, $name, $desc, $employee_id){
        return Task::create([
            'name' => $name,
            'description' => $desc,
            'owner_id' => $user_id,
            'employee_id' => $employee_id
        ]);
    }

    /**
     * Edit task status by task id.
     */
    public function editStatus($task_id,$status_id){

        $task = Task::findOrFail($task_id);
        $task->status_id = $status_id;
        $task->save();

        return $task;
    }

    /**
     * Get task by user_id.
     */
    public function getByUserId($user_id){
        return Task::where('employee_id',$user_id)->with(['owner','comments','status'])->get();
    }

     /**
     * Destroy task by id.
     */
    public function destroyById($task_id){
        $task = Task::findOrFail($task_id);

        return $task->delete();
    }

}

?>
