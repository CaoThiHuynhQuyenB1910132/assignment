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

                <div>
                    <div class="txt-s-101 txt-center">
                    <span class="cl3">
                        Returning customer?
                    </span>
                        <span class="cl10 hov12 js-toggle-panel1">
                        Click here to login
                    </span>
                    </div>
                    <div class="how-bor3 p-rl-15 p-tb-28 m-tb-33 dis-none js-panel1">
                        <form class="size-w-60 m-rl-auto">
                            <p class="txt-s-120 cl9 txt-center p-b-26">
                                If you have shopped with us before, please enter your details in the boxes below. If you are
                                a new customer, please proceed to the Billing & Shipping section.
                            </p>
                            <div class="row">
                                <div class="col-sm-6 p-b-20">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Username or email <span class="cl12">*</span>
                                        </div>
                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1" type="text"
                                               name="username">
                                    </div>
                                </div>
                                <div class="col-sm-6 p-b-20">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Password <span class="cl12">*</span>
                                        </div>
                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-15 focus1"
                                               type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                                        Login
                                    </button>
                                    <div class="flex-w flex-m p-t-10 p-b-3">
                                        <input id="check-creatacc" class="size-a-35 m-r-10" type="checkbox" name="creatacc">
                                        <label for="check-creatacc" class="txt-s-101 cl9">
                                            Create an account?
                                        </label>
                                    </div>
                                    <a href="#" class="txt-s-101 cl9 hov-cl10 trans-04">
                                        Lost your password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <form class="row">
                    <div class="col-md-7 col-lg-8 p-b-50">
                        <div>
                            <h4 class="txt-m-124 cl3 p-b-28">
                                Billing details
                            </h4>
                            <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                             <span>
                                Choose your address
                             </span>
                            </div>

                            @foreach($addresses as $key => $address)
                                <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                    <div class="form-check">
                                        <input
                                            wire:model.live="addressId"
                                            name="addressId"
                                            class="form-check-input"
                                            type="radio"
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
                                    </span>
                                </div>
                            @endforeach

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
                                    <img src="{{ $cart->product->productImages->count() ? asset('storage/' . $cart->product->productImages[0]->image) : '' }}" alt="contact-img" title="contact-img" class="rounded me-2" height="48">
                                    <img class="m-rl-3" src="client/new/images/icons/icon-multiply.png" alt="icon">
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
                                <span class="size-w-62 cl10">
                                {{ CurrencyHelper::format($total) }}
                            </span>
                            </div>
                            <div class="bo-all-1 bocl15 p-b-25 m-b-30">
                                <div class="flex-w flex-m bo-b-1 bocl15 p-rl-20 p-tb-16">
                                    <input class="m-r-15" id="radio1" type="radio" name="pay" value="payment"
                                           checked="checked">
                                    <label class="txt-m-103 cl6" for="radio1">
                                        Check Payments
                                    </label>
                                </div>
                                <div class="content-payment bo-b-1 bocl15 p-rl-20 p-tb-15">
                                    <p class="txt-s-120 cl9">
                                        Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                        Store Postcode.
                                    </p>
                                </div>
                                <div class="flex-w flex-m p-rl-20 p-t-17 p-b-10">
                                    <input class="m-r-15" id="radio2" type="radio" name="pay" value="paypal">
                                    <label class="txt-m-103 cl6" for="radio2">
                                        Paypal
                                    </label>
                                    <div class="w-full p-l-29 p-t-16">
                                        <a href="#"><img src="client/new/images/icons/paypal.png" alt="IMG"></a>
                                    </div>
                                </div>
                                <div class="content-paypal bo-tb-1 bocl15 p-rl-20 p-tb-15 m-tb-10 dis-none">
                                    <p class="txt-s-120 cl9">
                                        Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.
                                    </p>
                                </div>
                                <div class="p-l-49">
                                    <a href="#" class="txt-s-120 cl6 hov-cl10 trans-04 p-t-10">
                                        What is paypal?
                                    </a>
                                </div>
                            </div>
                            <button onclick="startCountdown()" type="button" class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10" data-toggle="modal" data-target="#exampleModal">
                                Place Order
                            </button>
                        </div>
                    </div>
                </form>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="flex-col-c-m how1 p-b-5 m-r-20 m-b-20">
                                    <h1 id="countdown" class="txt-l-102 cl6 seconds"><p id="timer"></p></h1>
                                    <span class="txt-m-106 cl9">
                                secs
                    </span>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                                <button
                                    type="button"
                                    wire:click="checkout"
                                    class="btn btn-primary">Order Now</button>
                            </div>
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

@push('styles')
    <script>
        function startCountdown() {
            let count = 5;
            let timer = document.getElementById('timer');

            const countdown = setInterval(function() {
                timer.innerHTML = count;
                count--;

                if (count < 0) {
                    clearInterval(countdown);
                    $('#exampleModal').modal('hide')
                }
            }, 1000);
        }
    </script>
@endpush




