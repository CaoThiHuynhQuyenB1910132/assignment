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
use Illuminate\Support\Facades\App;

class Checkout extends Component
{
    public $cartProducts;
    public $total;
    public $shippingAddresses;

    public mixed $paymentType;

    public mixed $showTypePayment;

    public array $productCart = [];

    public function updatedPaymentType()
    {
        $this->showTypePayment = $this->paymentType;
    }

    #[Rule('required')]
    public $addressId;

    #[Rule('required')]
    public $payment;

    #[Rule('nullable|max:255')]
    public $notes;

    protected $messages = [
        'addressId.required' => 'Choose your address',
        'notes.max' => 'Maximum 1024 characters.',
        'payment.required' => 'Please select 1 payment method.'
    ];

    public function mount()
    {
        $shippingAddresses = Address::where('user_id', Auth::user()->id)->get();

        $this->shippingAddresses = $shippingAddresses;

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
            'tracking_number' => Str::upper('FOOD' . Str::random(5)),
            'status' => 'pending',
            'payment' => $data['payment'],
            'shipping_address' => $shippingAddresses,
            'total' => $this->total,

        ]);

        foreach ($this->cartProducts as $product) {
            if ($product->product->stock == 1) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->product->id,
                    'quantity' => $product->quantity,
                    'purchase_price' => $product->product->selling_price,
                ]);
            }
        }

        Mail::to($order->user->email)->send(new OrderMail($order, $this->cartProducts));
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->route('thank.you');

    }

    public function checkoutVNPay()
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
            'tracking_number' => Str::upper('FOOD' . Str::random(5)),
            'status' => 'pending',
            'payment' => $data['payment'],
            'shipping_address' => $shippingAddresses,
            'total' => $this->total,
        ]);

        foreach ($this->cartProducts as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->product->id,
                'quantity' => $product->quantity,
                'purchase_price' => $product->product->selling_price,
            ]);
        }

        //        Mail::to($order->user->email)->send(new OrderMail($order));

        $vnpUrl = 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html';

        if (!App::environment('local')) {
            $vnpUrl = 'https://sandbox.vnpayment.vn/merchant_webapi/merchant.html';
        }

        $vnpReturnUrl = env('VNPAY_CALLBACK');

        $vnpTmnCode = config('services.vnPay.vnp_tmn_code');
        $vnpHashSecret = config('services.vnPay.vnp_hash_secret');

        $vnpTxnRef = $order->tracking_number;
        $vnpOrderInfo = 'Online payment';
        $vnpOrderType = 'bill payment';
        $vnpAmount = $this->total * 100;
        $vnpLocale = config('app.locale');
        $vnpBankCode = 'NCB';
        $vnpIpAddr = request()->ip();

        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $vnpTmnCode,
            'vnp_Amount' => $vnpAmount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $vnpIpAddr,
            'vnp_Locale' => $vnpLocale,
            'vnp_OrderInfo' => $vnpOrderInfo,
            'vnp_OrderType' => $vnpOrderType,
            'vnp_ReturnUrl' => $vnpReturnUrl,
            'vnp_TxnRef' => $vnpTxnRef,
        ];

        if ($vnpBankCode != '') {
            $inputData['vnp_BankCode'] = $vnpBankCode;
        }

        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }

            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $vnpUrl = $vnpUrl . '?' . $query;

        if (isset($vnpHashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnpHashSecret);
            $vnpUrl .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $carts = Cart::where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            $cart->delete();
        }

        return redirect($vnpUrl);
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
