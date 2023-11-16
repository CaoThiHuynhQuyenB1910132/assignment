<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function index(string $id): View
    {

        $product = Product::getProductById($id);

        $randomProducts = Product::inRandomOrder()->get();

        return view('client.product-detail.index', compact('product', 'randomProducts',  ));
    }

    public function addComment(Request $request, string $id): RedirectResponse
    {
        $data = $request->validate([
            'content' => 'nullable',
            'rating' => ['required', 'integer', 'min:1']
        ]);

        if (! Auth::check()) {
            toast('Log in before using the service', 'warning');
            return redirect('login');
        }

        $product = Product::getProductById($id);

        Feedback::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'content' => $data['content'],
            'rating' => $data['rating']
        ]);

        toast('Evaluation of success', 'success');

        return redirect()->back();
    }
}
