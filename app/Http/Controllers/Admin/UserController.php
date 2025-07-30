<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userRepo->create($request->validated());

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = $this->userRepo->find($id);

        if (!$user) {
            abort(404);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userRepo->update($id, $request->validated());

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $this->userRepo->delete($id);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
