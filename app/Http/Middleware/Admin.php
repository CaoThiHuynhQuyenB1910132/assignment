<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()-> is_admin === 1) {
            return $next($request);
        }

        return redirect()->route('/')->with('error', 'Bạn không có quyền truy cập vào trang này!!!');

    }
}
