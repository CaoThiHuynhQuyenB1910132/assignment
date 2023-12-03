<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ComingSoonController extends Controller
{
    public function __invoke(): View
    {
        return view('client.coming-soon.index');
    }
}
