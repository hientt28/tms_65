<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'image_url',
        'status',
    ];

    public function course_subjects()
    {
        return $this->hasMany(CourseSubject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
