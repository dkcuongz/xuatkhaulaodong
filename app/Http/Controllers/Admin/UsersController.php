<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->where('role_id', config('constants.user.roles.user'))->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(UserCreateRequest $request)
    {
        try {
        $data = $request->all();
        $data['role_id'] = config('constants.user.roles.user');
        $user = $this->repository->create($data);
        $response = [
            'message' => 'Tạo mới người dùng thành công.',
            'data' => $user->toArray(),
        ];
            return redirect(route('admin.users.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message',$e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->where('role_id', config('constants.user.roles.user'))->find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->where('role_id', config('constants.user.roles.user'))->find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['role_id'] = config('constants.user.roles.user');
            $user = $this->repository->update($data, $id);
            $response = [
                'message' => 'Chỉnh sửa người dùng thành công.',
                'data' => $user->toArray(),
            ];
            return redirect(route('admin.users.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->back()->with('success_message', 'Xóa người dùng thành công.');
    }
}
