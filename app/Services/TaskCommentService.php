<?php
namespace App\Services;

use App\Models\TaskComment;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskCommentService{

    /**
     * Create task comment.
     */
    public function store($user_id, $text,$task_id){
        return TaskComment::create([
            'text' => $text,
            'task_id' => $task_id,
            'user_id' => $user_id,
        ]);
    }

}

?>
