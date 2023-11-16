<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $productId;
    public $quantity;
    public $product;

    protected $rules = [
        'quantity' => ['required', 'integer', 'min:1'],
    ];

    public function mount(int $productId)
    {
        $this->productId = $productId;
        $this->product = Product::find($productId);
    }

    public function incQuantity()
    {
        $this->quantity++;

    }

    public function decQuantity()
    {
        $this->quantity--;
    }

    public function addToCart(): void
    {
        $this->validate();

        $checkProductExists = Cart::where('user_id', Auth::id())
            ->where('product_id', $this->productId)
            ->first();

        if (!$checkProductExists) {
            Cart::create([
                'product_id' => $this->productId,
                'user_id' => Auth::id(),
                'quantity' => $this->quantity,
            ]);

            session()->flash('success', 'Added product!');
        } else {
            $newQuantity = $checkProductExists->quantity + $this->quantity;

            if ($newQuantity >= 10) {
                session()->flash('error', 'Product quantity reached maximum limit!');
            } else {
                $checkProductExists->update([
                    'quantity' => $newQuantity,
                ]);

                session()->flash('success', 'Added product!');
            }
        }
    }

    public function render()
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

        return view('livewire.product-detail',[
            'product' => $this->product,
            'productRating' => $productRating,
            'feedbacks' => $feedbacks,
            'checkBought' => $checkBought
        ]);
    }

}
