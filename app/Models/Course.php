<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'image_url',
    ];

    public function courseSubjects()
    {
        return $this->hasMany(CourseSubject::class);
    }
}
