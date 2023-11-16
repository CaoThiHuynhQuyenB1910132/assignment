<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class MiniCartComponent extends Component
{
    public function deleteMiniCartProduct(string $id): void
    {
        $product = Cart::where('product_id', $id)
            ->where('user_id', Auth::id())->firstOrFail();
        $product->delete();
        $this->dispatch('refreshMiniCart');
    }

    #[On('refreshMiniCart')]
    public function render(): View
    {
        $carts = Cart::where('user_id', Auth::id())
            ->take(2)
            ->get();

        $count =  Cart::where('user_id', Auth::id())
            ->count();

        return view('livewire.mini-cart-component', compact('carts', 'count'));
    }
}
