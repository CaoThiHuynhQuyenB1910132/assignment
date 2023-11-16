<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('client.cart.index');
    }

    //add cart in Product detail
//    public function addToCart(Request $request, int $productId): RedirectResponse
//    {
//        $data = $request->validate([
//            'quantity' => ['required', 'integer', 'min:1'],
//        ]);
//
//        $checkProductExists = Cart::where('user_id', Auth::id())
//            ->where('product_id', $productId)
//            ->first();
//
//        if (! $checkProductExists) {
//            Cart::create([
//                'product_id' => $productId,
//                'user_id' => Auth::id(),
//                'quantity' => $data['quantity'],
//            ]);
//
//            toast('Added product!', 'success');
//
//            return redirect()->back();
//        }
//
//        $newQuantity = $checkProductExists->quantity + $data['quantity'];
//
//        if ($newQuantity >= 10) {
//
//            toast('Product quantity reached maximum limit!', 'error');
//
//            return redirect()->back();
//        }
//
//        $checkProductExists->update([
//            'quantity' => $newQuantity,
//        ]);
//
//        toast('Added product!', 'success');
//
//        return redirect()->back();
//    }

}
