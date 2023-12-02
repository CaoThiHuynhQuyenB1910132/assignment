<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $searchInput = $request->input('searchInput');
        $users = User::query()->orderByDesc('created_at')
            ->when($searchInput, function ($query) use ($searchInput) {
                return $query->where('name', 'like', '%' . $searchInput . '%');
            })->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $user = $request->validated();

        User::create([
            'name' => $user['name'],
            'gender' => $user['gender'],
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

    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'is_admin' => 'required'
        ]);

        $user = User::getUserById($id);

        $user->update([
            'name' => $data['name'],
            'is_admin' => $data['is_admin'],
        ]);

        toast('Updated User', 'success');
        return redirect('user');
    }

    public function delete(string $id): RedirectResponse
    {
        $user = User::getUserById($id);

        $user->delete();
        toast('Deleted User', 'success');
        return redirect('user');
    }
}
