<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use DB;

class TaskRepository extends BaseRepository
{
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function search($input)
    {
        $tasks = Task::orderBy('id', 'DESC');
        if (!empty($input)) {
            $tasks = $tasks->where("name", "LIKE", "%{$input}%")
                ->paginate(config('common.pagination.per_page_task'))
                ->appends(['search' => $input]);
        } else {
            $tasks = $tasks->paginate(config('common.pagination.per_page_task'));
        }
       
        return $tasks;
    }

    public function deleteMulti($ids)
    {
        try {
            DB::beginTransaction();
            Task::destroy($ids['id']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }
}
