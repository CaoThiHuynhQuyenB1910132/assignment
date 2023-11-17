<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class WishlistComponent extends Component
{
    use LivewireAlert;

    public mixed $wishlist = [];

    public mixed $user;

    public string|int $productId;

    #[On('refreshWishlist')]
    public function mount(): void
    {
        if (! Auth::user()) {
            $this->wishlist = [];
            return;
        }

        $user = User::where('id', Auth::id())
            ->with('wishlists')
            ->first();
        $this->user = $user;
        $this->wishlist = $user->wishlists->pluck('product_id')->toArray() ?? [];
    }

    public function addToWishList(string|int $productId): void
    {
        if (! Auth::user()) {
            $this->redirectRoute('login');
            return;
        }

        $wishlist = WishList::where(function ($query) use ($productId) {
            $query->where('user_id', Auth::id())
                ->where('product_id', $productId);
        })
            ->first();

        if(! $wishlist) {
            WishList::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
            $this->alert('success', 'Added To Wishlist');
            $this->dispatch('refreshWishlist');

            return;
        }

        $wishlist->delete();
        $this->alert('success', 'Remove From Wishlist');
        $this->dispatch('refreshWishlist');

    }

    public function render(): View
    {
        return view('livewire.wishlist-component');
    }
}
