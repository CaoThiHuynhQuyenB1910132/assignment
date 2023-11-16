<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        return view('client.shop.index');
    }

    public function wishList(): View
    {
        $wishlists = WishList::where('user_id', Auth::user()->id)->get();

        return view('client.shop.wish-list', compact('wishlists'));
    }
}
