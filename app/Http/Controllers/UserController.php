<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public function __construct(private UserService $userService) {}


    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('permission:view product', only: ['index']),
            new Middleware('permission:view detail product', only: ['show']),
            new Middleware('permission:create product', only: ['create', 'store']),
            new Middleware('permission:edit product', only: ['edit']),
            new Middleware('permission:update product', only: ['update']),
            new Middleware('permission:delete product', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->getPaginate();
        $userCount = $users->count();
        return view('admin.user.index', compact('users', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->userService->getRoles();
        $permissions = $this->userService->getPermissions();
        return view('admin.user.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->createUser($request->validated(), $request->file('image'));
        return redirect()->back()->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return  view('admin.user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->userService->getRoles();
        $permissions = $this->userService->getPermissions();
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $this->userService->updateUser($request->validated(), $id);
        return redirect()->back()->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}