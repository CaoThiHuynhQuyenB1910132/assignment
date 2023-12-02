<div>
    <section class="how-overlay2 bg-img" style="background-image: url(client/new/images/img/pizza1.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Checkout
                </h2>
            </div>
        </div>
    </section>

    @if ($carts->count() > 0)
        <div class="bg0 p-t-95 p-b-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-8 p-b-50">
                        <div>
                            <h4 class="txt-m-124 cl3 p-b-28">
                                Billing details
                            </h4>
                            <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                 <span>
                                    Choose your address
                                     <span class="cl12">*</span>
                                 </span>
                                <span class="cl10 hov12 js-toggle-panel1">
                                    <img src="{{ asset('client/new/images/icons/edit.png') }}" alt="IMG" width="20px">
                                    <span class="size-w-53 txt-s-101 cl6">
                                        Address
                                    </span>
                                </span>
                            </div>
                            <div class="m-t-35 dis-none js-panel1">
                                <div class="size-w-60 flex-w m-rl-auto">
                                    <div wire:ignore.self>
                                        <livewire:location wire:key="location"></livewire:location>
                                    </div>
                                </div>
                            </div>
                            @foreach($addresses as $key => $address)
                                <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18" id="address">

                                    <div class="form-check">
                                        <input
                                            wire:model.live="addressId"
                                            name="addressId"
                                            class="form-check-input"
                                            type="radio"
                                            for="address"
                                            value="{{ $address->id }}"
                                            id="{{ $key }}">
                                        <label class="form-check-label" for="{{ $key }}">
                                            {{ $address->name }},
                                            {{ $address->phone }},
                                            {{ $address->house_number }},
                                            {{ $address->ward->name }},
                                            {{ $address->district->name}},
                                            {{ $address->province->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            @if(! $addresses->count())
                                <div class="flex-t p-tb-8 m-r-30">
                                    <img class="m-t-6 m-r-10 m-auto" src="client/new/images/icons/icon-address.png" alt="IMG" width="20px">
                                    <span class="size-w-53 txt-s-101 cl6">
                                        Please add address before payment.
                                    </span>
                                </div>
                            @endif

                            @error('addressId')
                            <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div>
                                <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                    Order notes
                                </div>
                                <textarea wire:model="notes" class="plh2 txt-s-120 cl3 size-a-38 bo-all-1 bocl15 p-rl-20 p-tb-10 focus1"
                                          name="notes"
                                          placeholder="Note about your order">
                                </textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 p-b-50">
                        <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">
                            <h4 class="txt-m-124 cl3 p-b-11">
                                Your order
                            </h4>
                            <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                            <span>
                                Product
                            </span>
                                <span>
                                Total
                            </span>
                            </div>

                            @foreach($carts as $cart)
                                <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                <span>
                                    {{ $cart->product->name }}
                                    <img src="{{ $cart->product->productImages->count() ? asset('storage/' . $cart->product->productImages[0]->image) : asset('images/empty-state.png') }}" alt="contact-img" title="contact-img" class="rounded me-2" height="48">
                                    <img class="m-rl-3" src="{{ asset('client/new/images/icons/icon-multiply.png') }}" alt="icon">
                                    {{ $cart->quantity }}
                                </span>
                                    <span>
                                    {{ CurrencyHelper::format($cart->product->selling_price * $cart->quantity) }}
                                </span>
                                </div>
                            @endforeach

                            <div class="flex-w flex-m txt-m-103 p-tb-23">
                                <span class="size-w-61 cl6">
                                    Total
                                </span>
                                    <span wire:model="total" class="size-w-62 cl10">
                                    {{ CurrencyHelper::format($total) }}
                                </span>
                            </div>

                            <div wire:model="payment" class="bo-all-1 bocl15 p-b-25 m-b-30">
                                <div class="flex-w flex-m bo-b-1 bocl15 p-rl-20 p-tb-16">
                                    <input type="radio" value="OrdCode" wire:model.live="paymentType" id="OrdCode" class="m-r-15">
                                    <label class="txt-m-103 cl6" for="OrdCode">
                                        Cash on delivery
                                    </label>
                                </div>

                                <div class="flex-w flex-m p-rl-20 p-t-17 p-b-10">
                                    <input type="radio" value="payment" wire:model.live="paymentType" name="" id="payment" class="m-r-15">
                                    <label class="txt-m-103 cl6" for="payment">
                                        VNPay
                                        <div class="w-full p-l-29 p-t-16">
                                            <img src="{{ asset('client/new/images/icons/vnpay.png') }}" style="width: 100px" alt="IMG">
                                        </div>
                                    </label>
                                </div>
                            </div>

                            @error('payment')
                            <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @switch($showTypePayment)
                                @case('payment')
                                        <input type="hidden" name="total" value="{{$cart->product->selling_price * $cart->quantity}}">
                                        <button
                                            wire:loading.attr="disabled"
                                            wire:click="checkoutVNPay" type="submit" name="redirect" class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10" data-toggle="modal" data-target="#exampleModal">
                                            Order With VNpay
                                        </button>
                                    @break;
                                @default
                                    <button
                                        wire:click="checkout"
                                        wire:loading.attr="disabled" type="button" class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10" data-toggle="modal" data-target="#exampleModal">
                                        Place Order
                                    </button>
                            @endswitch
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                <div class="text-center" style="margin-top: 30px; margin-bottom: 30px">
                    <div class="my-3">
                        <h1>Your cart is empty</h1>
                    </div>
                    <div>
                        <a href="{{ route('shop') }}"
                           class="flex-c-m txt-s-103 cl6 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04">
                            Shop now
                            <span class="lnr lnr-chevron-right m-l-7"></span>
                            <span class="lnr lnr-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>





