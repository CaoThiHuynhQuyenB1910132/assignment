<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        return view('client.order.checkout');
    }

    public function thankYou(): View
    {
        return view('client.order.thank-you');
    }

}
