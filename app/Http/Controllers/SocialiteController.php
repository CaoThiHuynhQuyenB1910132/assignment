<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse|string
    {
        try {
            $socialAccount = Socialite::driver($provider)->user();

            $user = User::updateOrCreate([
                'provider_id' => $socialAccount->getId(),
            ], [

                'name' => $socialAccount->getName(),
                'email' => $socialAccount->getEmail(),
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => Carbon::now(),
                'provider_id' => $socialAccount->getId(),
            ]);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
