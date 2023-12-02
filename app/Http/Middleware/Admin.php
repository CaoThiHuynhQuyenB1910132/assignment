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
        toast('You do not have permission to access this page!!!', 'danger');
        return redirect()->route('/');

    }
}
