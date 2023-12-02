<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated()
    {
        if (Auth::user()->is_admin == 1){
            return redirect('/dashboard')->with('status', 'wellcome to your dashboard');
        }
        elseif (Auth::user()->is_admin == 0){
            return redirect('/')->with('status', 'Login in successfully');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
