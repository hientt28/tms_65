<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $fillable = [
        'user_course_id',
        'task_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }
}
