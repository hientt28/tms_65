<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'subject_id',
        'name',
        'description',
    ];

    public function getUpdatedAtStatusAttribute()
    {
        $now = Carbon::now();
        $status = $this->updated_at->diffForHumans($now);

        return $status;
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['updated_at_status'] = $this->updated_at_status;
        return $array;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
