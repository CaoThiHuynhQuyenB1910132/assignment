<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function index(string $id): View
    {
        $product = Product::getProductById($id);

        $randomProducts = Product::inRandomOrder()->get();

        return view('client.product-detail.index', compact('product', 'randomProducts', ));
    }

}
