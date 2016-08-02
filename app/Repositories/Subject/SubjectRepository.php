<?php

namespace App\Repositories\Subject;

use App\Models\Subject;
use App\Models\Task;
use App\Repositories\BaseRepository;
use DB;

class SubjectRepository extends BaseRepository
{
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }

    public function search($input)
    {
        $subjects = Subject::orderBy('id', 'DESC');
        if (!empty($input)) {
            $subjects = $subjects->where("name", "LIKE", "%{$input}%")
                ->paginate(config('common.pagination.per_page_subject'))
                ->appends(['search' => $input]);
        } else {
            $subjects = $subjects->paginate(config('common.pagination.per_page_subject'));
        }

        return $subjects;
    }

    public function deleteById($id)
    {
        try {
            DB::beginTransaction();
            Subject::destroy($id);
            Task::where('subject_id', $id)->delete();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            abort(500);
        }

        return true;
    }

    public function deleteMulti($ids)
    {
        try {
            DB::beginTransaction();
            Subject::destroy($ids['id']);
            Task::whereIn('subject_id', $ids['id'])->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }
}
