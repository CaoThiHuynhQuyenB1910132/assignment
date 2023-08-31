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

        return redirect('user')->with('status', 'Add User Successfully!');
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

        if (Hash::check($data['password'], $user->password)) {
            $user->updated([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'status' => $data['status'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => $data['is_admin'],
            ]);
        } else {
            toast()->error('Ôi! Sai Mật Khẩu!');

            return redirect()->back();
        }

        toast()->success('Cập Nhật Mật Khẩu Thành Công!');
        return redirect('user');
    }

    public function delete(string $id): RedirectResponse
    {
        $user = User::getUserById($id);

        $user->delete();

        return redirect('user')->with('status', 'Xóa Người Dùng Thành Công!');
    }
}
