<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products =  Product::orderBy('created_at', 'desc')
            ->where('featured', 1)
            ->where('stock', 1)
            ->take(10)->get();

        $categories = Category::orderBy('created_at', 'desc')
            ->where('featured', 1)
            ->take(4)->get();
        return view('client.home.index', compact('products', 'categories'));
    }

}
