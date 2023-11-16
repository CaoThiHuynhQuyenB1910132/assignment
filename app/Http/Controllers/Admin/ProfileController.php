<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use ImageTrait;
    public function index(string $id): View
    {
        $user = User::getUserById($id);

        return view('admin.user.profile', compact('user'));
    }

    public function updateProfile(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate(
            [
            'name' => 'required',
            'gender' => 'nullable',
            'phone' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'avatar' => 'nullable|max:4096'
        ],
            [
                'name.required' => 'not empty',
                'phone.required' => 'Not be empty.',
                'phone.numeric' => 'Wrong format.',
                'phone.regex' => 'Wrong format.',
            ]
        );

        $user = User::getUserById($id);

        if (! $request->hasFile('avatar')) {
            $data['avatar'] = $user->avatar;
        }

        if ($request->hasFile('avatar')) {
            $oldAvt = 'storage/' . $user->avatar;

            $this->deleteImage($oldAvt);

            $data['avatar'] = $this->uploadAvatar($request, 'avatar', 'avatars');
        }

        $user->update([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'avatar' => $data['avatar']
        ]);

        toast('Updated User', 'success');
        return redirect()->back();
    }

    public function updatePassword(Request $request, string $id): RedirectResponse
    {
        $user = User::getUserById($id);

        $data = $request->validate([
            'password_old' => 'required',
            'password' => ['required', 'string', 'min:8', 'max:32'],
            'new_password_confirmation' => ['required','same:password'],
        ]);

        if(!Hash::check($request->password_old, $user->password)) {
            toast('Opps!!! Old password is incorrect please check again.', 'warning');
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        toast('Your password is updated.', 'success');

        return redirect()->back();

    }


}
