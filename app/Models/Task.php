<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'employee_id'
    ];

    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }

    public function employee(){
        return $this->hasOne(User::class,'id','employee_id');
    }

    public function comments(){
        return $this->hasMany(TaskComment::class,'task_id','id');
    }

    public function status(){
        return $this->hasOne(TaskStatus::class,'id','status_id');
    }
}
