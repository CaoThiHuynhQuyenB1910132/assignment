<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('created_at')->get()->take(6);

        return view('client.shop.index', compact('products'));
    }

}
