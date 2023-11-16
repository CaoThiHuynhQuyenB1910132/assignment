<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Cart;

class CartDetail extends Component
{
    use LivewireAlert;

    public $count;
    public $total;
    public $cartProduct;
    public $quantity;

    public function mount(): void
    {
        if (Auth::user()) {
            $cartProduct = $this->getUserCart();
            $count = Cart::where('user_id', Auth::user()->id)->count();
            $this->cartProduct = $cartProduct;
            $this->count = $count;
        } else {
            $this->count = 0;
        }
    }

    #[On('refreshCart')]

    public function getUserCart()
    {
        return Cart::where('user_id', Auth::user()->id)->get();
    }

    // add cart detail
    public function incQuantity(string $id): void
    {
        $product = Cart::where('product_id', $id)
            ->where('user_id', Auth::user()->id)->firstOrFail();

        if ($product->quantity < 10) {
            $product->increment('quantity');
        } else {
            $this->alert('warning', 'Maximum 10 products');

        }
    }

    public function decQuantity(string $id): void
    {
        $product = Cart::where('product_id', $id)
            ->where('user_id', Auth::user()->id)->firstOrFail();

        if ($product->quantity > 1) {
            $product->decrement('quantity');
        } else {
            $this->alert('warning', 'Minimum 1 product');
        }
    }

    public function deleteCartProduct(string $id): void
    {
        $product = Cart::where('product_id', $id)
            ->where('user_id', Auth::user()->id)->firstOrFail();
        $product->delete();
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($carts as $product) {
            if(! Product::where('id', $product->product_id)->where('stock', 1)->exists()) {
                $removeItem = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->product_id)->first();
                $removeItem -> delete();
            }
        }

        return view('livewire.cart-detail', [
            'carts' => $carts,
        ]);
    }
}
