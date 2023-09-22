<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        return view('client.cart.index', [
            'carts' => $carts
        ]);
    }

    public function addToCart(Request $request, int $productId): RedirectResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $checkProductExits = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if (! $checkProductExits) {
            Cart::create([
                'product_id' => $productId,
                'user_id' => Auth::id(),
                'quantity' => $data['quantity'],
            ]);

            toast('Added product!', 'success');

            return redirect()->back();
        }

        $checkProductExits->update([
            'quantity' => $checkProductExits->quantity + $data['quantity'],
        ]);

        toast('Added product!', 'success');

        return redirect()->back();
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => ['required', 'integer'],
            'type' => ['required', 'in:inc,dec'],
        ]);

        $product = Cart::find($data['id']);

        if (! $product) {
            return response()->json([
                'message' => 'Not found product!',
            ]);
        }

        if ($data['type'] == 'inc') {
            $product->update([
                'quantity' => $product->quantity + 1,
            ]);

            return response()->json([
                'message' => 'success',
                'data' => $product,
            ]);
        }

        if ($data['type'] == 'dec') {
            if ($product->quantity >= 2) {
                $product->update([
                    'quantity' => $product->quantity - 1,
                ]);

                return response()->json([
                    'message' => 'success',
                    'data' => $product,
                ]);
            }
        }

        $product->delete();

        return response()->json([
            'message' => 'success',
            'data' => 'Delete product success!',
        ]);

    }

    public function delete(string $id): RedirectResponse
    {
        $product = Cart::getCartById($id);

        $product->delete();

        toast('Deleted product!', 'success');

        return redirect()->back();
    }
}
