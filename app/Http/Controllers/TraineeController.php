<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests;
use App\Repositories\BaseRepositoryInterface;

class TraineeController extends Controller
{
    private $userRepository;

    public function __construct(BaseRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(trans('trainee.limit'));
        return view('suppervisor.trainee.index', compact('users'));
    }

    /**
     * Show the form for creating a new resourc
     *
     * @return Response
     */
    public function create()
    {
        return view('suppervisor.trainee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $newTrainee = $request->only('name', 'email', 'password');
        $newTrainee['role'] = config('common.user.role.trainee');
        try {
            $data = $this->userRepository->create($newTrainee);
        } catch (Exception $e) {
            return redirect()->route('admin.trainees.index')->withError($e->getMessage());
        }

        return redirect()->route('admin.trainees.index')->withSuccess(trans('message.create_user_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $user = $this->userRepository->showById($id);
        } catch (Exception $ex) {
            return redirect()->route('admin.trainees.index')->withError($ex->getMessage());
        }

        return view('suppervisor.trainee.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $trainee = $this->userRepository->showById($id);
        } catch (Exception $e) {
            return redirect()->route('admin.trainees.index')->withError($e->getMessage());
        }

        return view('suppervisor.trainee.edit', compact('trainee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->only(['email', 'name', 'password']);
        try {
            $data = $this->userRepository->updateById($data, $id);
        } catch (Exception $e) {
            return redirect()->route("admin.trainees.index")->withError($e->getMessage());
        }

        return redirect()->route("admin.trainees.index")->withSuccess(trans('message.edit_user_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->userRepository->deleteById($id);
        } catch (Exception $e) {
            return redirect()->route('admin.trainees.index')->withError($e->getMessage());
        }

        return redirect()->route('admin.trainees.index');
    }
}
