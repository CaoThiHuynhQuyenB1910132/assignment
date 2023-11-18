<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductDetail extends Component
{
    use LivewireAlert;

    public $productId;

    public $quantity = 1;

    public $product;

    public $rating;

    public $content;

    protected array $rules = [
        'quantity' => ['required', 'integer', 'min:1'],
    ];

    #[On('refreshProductCart')]
    public function mount($productId): void
    {
        $this->product = Product::find($productId);
    }

    public function incQuantity(): void
    {
        if ($this->quantity < 10) {
            $this->quantity++;
        }
    }

    public function decQuantity(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart(string|int $productId): void
    {
        if (! Auth::user()) {
            $this->redirectRoute('login');
            return;
        }

        $checkProductExists = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if (! $checkProductExists) {
            Cart::create([
                'product_id' => $productId,
                'user_id' => Auth::id(),
                'quantity' => $this->quantity,
            ]);

            $this->alert('success', 'Added To Cart');
            $this->dispatch('refreshMiniCart');
            return;
        }

        $newQuantity = $checkProductExists->quantity + $this->quantity;

        if ($newQuantity <= 10) {
            $checkProductExists->update([
                'quantity' => $newQuantity,
            ]);

            $this->alert('success', 'Update cart success');
            $this->dispatch('refreshMiniCart');
            return;
        }
        $this->alert('warning', 'Maximum 10 items');
    }

    public function updateRating(int $rating)
    {
        $this->rating = $rating;
    }

    public function addComment()
    {
        $data = $this->validate([
            'content' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
            'content' => $data['content'],
            'rating' => $data['rating']
        ]);

        $this->alert('success', 'Add Comment success');
        $this->reset('rating', 'content');
    }

    public function render(): View
    {
        $checkBought = false;
        if (Auth::user()) {
            $productIds = [];

            foreach (Auth::user()->orders as $order) {
                foreach ($order->orderProducts as $orderProduct) {
                    $productIds[] = $orderProduct->product_id;
                }
            }

            if(in_array($this->product, $productIds)) {
                $checkBought = true;
            }
        }
        $productRating = round(FeedBack::where('product_id', $this->product->id)->avg('rating'), 1);
        $feedbacks = Feedback::where('product_id', $this->product->id)->orderBy('id', 'desc')->paginate(5);

        return view('livewire.product-detail', [
            'product' => $this->product,
            'productRating' => $productRating,
            'feedbacks' => $feedbacks,
            'checkBought' => $checkBought
        ]);
    }

}
