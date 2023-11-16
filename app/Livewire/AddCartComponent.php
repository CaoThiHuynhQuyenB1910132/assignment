<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class AddCartComponent extends Component
{
    use LivewireAlert;

    public mixed $user;

    public int $quantity = 1;

    public string|int $productId;

    #[On('refreshAddToCart')]

    public function mount(): void
    {
        $user = User::where('id', Auth::id())
            ->with('carts')
            ->first();
        $this->user = $user;

    }
    //add cart in List Shop
    public function addCart(string|int $productId): void
    {
        if (! Auth::user()) {
            $this->redirectRoute('login');
            return;
        }

        $product = Cart::where(function ($query) use ($productId) {
            $query->where('user_id', Auth::id())
                ->where('product_id', $productId);
        })
            ->first();

        if ($product && $product->quantity > 10) {
            $this->alert('warning', 'Maximum 10 items');
            $this->dispatch('refreshMiniCart');
            return;
        }

        if ($product) {
            if ($product->quantity < 10) {
                $product->increment('quantity');
                $this->alert('success', 'Update cart success');
                $this->dispatch('refreshMiniCart');
                return;
            }

            $this->alert('warning', 'Maximum 10 items');
            $this->dispatch('refreshMiniCart');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $this->quantity,
            ]);

            $this->alert('success', 'Added To Cart');
            $this->dispatch('refreshMiniCart');
        }
    }

    public function render(): View
    {
        return view('livewire.add-cart-component');
    }
}
