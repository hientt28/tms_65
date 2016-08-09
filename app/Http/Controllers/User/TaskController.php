<?php

namespace App\Http\Controllers\User;

use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tasks = [];
        $user = $this->userRepository->showById($id);
        if (count($user->userTasks) > 0) {
            $tasks = $user->userTasks;
        }

        return view('users.tasks.index', ['tasks' => $tasks]);
    }
}
