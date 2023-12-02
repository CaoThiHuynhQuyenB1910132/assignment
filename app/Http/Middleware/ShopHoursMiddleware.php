<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShopHoursMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Define your shop's opening and closing times
        $openingTime = Carbon::createFromTime(24, 5, 0); // 8:00 AM
        //        $closingTime = Carbon::createFromTime(24, 0, 0); // 10:00 PM

        $now = Carbon::now();

        // Check if the current time is outside of operating hours
        //        if ($now < $openingTime || $now > $closingTime) {
        //            return redirect('/coming-soon'); // Redirect to the "coming soon" page
        //        }

        return $next($request);
    }
}
