<?php

namespace App\Livewire;

use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class CouponModal extends Component
{
    public string $code;

    public int $amount;

    public string $type;

    public mixed $discountPrice;

    public bool $isEdit = false;

    public function createCoupon()
    {
        $validatedData = $this->validate([
            'code' => 'string|min:5|max:20|unique:coupons,code',
            'amount' => 'required|numeric|min:0|max:1000000000',
            'type' => 'string|in:percent,fixed',
            'discountPrice' => 'required|numeric|min:1'
        ]);



        $coupon = Coupon::create([
            'code' => $validatedData['code'],
            'amount' => $validatedData['amount'],
            'type' => $validatedData['type'],
            'discount_price' => $validatedData['discountPrice'],
        ]);
        toast('Create New '. $coupon->code .' Success', 'success');
        $this->reset(['code', 'amount', 'type']);

        return redirect()->to('coupon');
    }

    public function editCoupon(string|int $id)
    {
        dd($id);
    }

    public function generateCode(): string
    {
        return $this->code = Str::random(8);
    }

    public function render(): View
    {
        return view('livewire.coupon-modal');
    }
}
