<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public int $itemPerPage = 10;

    public function index(): View
    {
        $users = User::query()->orderByDesc('created_at')->paginate($this->itemPerPage);

        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $user = $request->validated();

        User::query()->create([
            'name' => $user['name'],
            'gender' => $user['gender'],
            'status' => $user['status'],
            'phone' => $user['phone'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'is_admin' => $user['is_admin'],
        ]);

        toast('Add User Successfully!', 'success');
        return redirect('user');
    }

    public function edit(string $id): View
    {
        $user = User::getUserById($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $user = User::getUserById($id);

        $user->update([
            'name' => $data['name'],
            'status' => $data['status'],
            'is_admin' => $data['is_admin'],
        ]);

        toast('Updated User','success');
        return redirect('user');
    }

    public function delete(string $id): RedirectResponse
    {
        $user = User::getUserById($id);

        $user->delete();
        toast('Deleted User','success');
        return redirect('user');
    }
}
