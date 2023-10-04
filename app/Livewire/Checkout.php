<?php

namespace App\Livewire;

use App\Mail\OrderMail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Checkout extends Component
{
    public $cartProducts, $total, $shippingAddresses;

    #[Rule('required')]
    public $addressId;

    #[Rule('nullable|max:255')]
    public $notes;

    protected $messages = [
        'addressId.required' => 'Choose your address',
        'notes.max' => 'Tối đa 1024 ký tự.',
    ];

    public function mount()
    {
        $shippingAddresses = Address::where('user_id', Auth::user()->id)->get();
        if ($shippingAddresses->count() === 0) {
            toast('Vui lòng thêm địa chỉ trước khi thanh toán.', 'warning');
            return redirect()->route('account');
        }
        $this->shippingAddresses= $shippingAddresses;

        $this->cartProducts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($this->cartProducts as $cartProduct) {
            $this->total += $cartProduct->product->selling_price * $cartProduct->quantity;
        }
    }

    public function checkout()
    {
        $data = $this->validate();

        $selectAddress = Address::where('id', $this->addressId)->firstOrFail();
        $userName = $selectAddress->user->name;
        $houseNumber = $selectAddress->house_number;
        $ward = $selectAddress->ward->name;
        $district = $selectAddress->district->name;
        $province = $selectAddress->province->name;
        $shippingAddresses = $userName . ', ' .  $houseNumber . ', ' . $ward . ', ' . $district . ', ' . $province;

        $order = Order::create([
            'notes' => $data['notes'],
            'user_id' => Auth::user()->id,
            'tracking_number' => Str::upper('ORG' . Str::random(5)),
            'status' => 'pending',
            'shipping_address' => $shippingAddresses,
            'total' => $this->total,
        ]);

        foreach ($this->cartProducts as $product){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->product->id,
                'quantity' => $product->quantity,
                'purchase_price' => $product->product->selling_price,
            ]);
        }

        Mail::to($order->user->email)->send(new OrderMail($order));
        Cart::where('user_id', Auth::user()->id)->delete();
        toast('Added product!', 'success');
        return redirect()->route('thank.you');

    }

    public function newPhoneNumber(){

    }
    public function render(): View
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        $addresses = Address::where('user_id', Auth::id())->get();

        return view('livewire.checkout', [
            'carts' => $carts,
            'addresses' => $addresses,
        ]);
    }
}
