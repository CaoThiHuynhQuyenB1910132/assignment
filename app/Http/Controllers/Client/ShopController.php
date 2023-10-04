<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('created_at')->get()->take(6);

        $categories = Category::all();

        return view('client.shop.index', compact('products', 'categories'));
    }

    public function search(Request $request): View
    {
        $searchTerm = $request->input('search');

        $categories = Category::all();

        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('client.shop.index',
            [
                'products' => $products,
                'categories' => $categories
            ]);
    }

}
