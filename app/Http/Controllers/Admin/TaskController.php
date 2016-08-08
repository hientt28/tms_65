<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Repositories\Task\TaskRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->input('search');
        $tasks = $this->taskRepository->search($key);

        return view('admin.tasks.index', ['listTasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::lists('name', 'id')->all();

        return view('admin.tasks.create', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'subject_id' => 'required',
        ]);
        
        try {
            $inputs = $request->only(['name', 'description', 'subject_id']);
            $this->taskRepository->create($inputs);
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage())->withInput();
        }

        return redirect(route('admin.tasks.index'))->withSuccess(trans('message.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tasks = $this->taskRepository->showById($id);
        } catch (\Exception $e) {
            return redirect(route('admin.tasks.index'))->withError($e->getMessage());
        }

        return $tasks;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $subjects = ['' => 'Select Subject'] + Subject::lists('name', 'id')->all();
            $task = $this->taskRepository->showById($id);
        } catch (\Exception $e) {
            return redirect(route('admin.tasks.index'))->withError($e->getMessage());
        }

        return view('admin.tasks.edit', ['tasks' => $task, 'subjects'=> $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'subject_id' => 'required',
        ]);

        try {
            $inputs = $request->only(['name', 'description', 'subject_id']);
            $this->taskRepository->updateById($inputs, $id);
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage())->withInput();
        }

        return redirect(route('admin.tasks.index'))->withSucces(trans('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->taskRepository->deleteById($id);
        } catch (\Exception $e) {
            return redirect(route('admin.tasks.index'))->withError($e->getMessage());
        }

        return redirect(route('admin.tasks.index'))->withSucces(trans('message.delete_success'));
    }

    //    delete multi
    public function deleteMulti(Request $request)
    {
        $ids = $request->all();
        $this->taskRepository->deleteMulti($ids);
        $tasks = $this->taskRepository->paginate(config('common.pagination.per_page_task'));
        $view = view('admin.partials.list_task', ['listTasks' => $tasks])->render();

        return Response::json([
            'view' => $view,
        ]);
    }
}
