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
                                          {{ $address->name }}
                                          {{ $address->phone }}
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
                                      name="note"
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
                                @foreach($cart->product->productImages as $image)
                                    <img width="40px" src="{{ ('storage/' . $image->image) }}" alt="">
                                @endforeach
                                <img class="m-rl-3" src="client/new/images/icons/icon-multiply.png" alt="icon">
                                {{ $cart->quantity }}
                                </span>
                                    <span>
                                    {{ number_format($cart->product->selling_price * $cart->quantity, 0, '.', '.') }} VNĐ
                                </span>
                            </div>
                        @endforeach

                        <div class="flex-w flex-m txt-m-103 p-tb-23">
                            <span class="size-w-61 cl6">
                                Total
                            </span>
                            <span class="size-w-62 cl10">
                                {{ number_format($total, 0, '.','.') }} VNĐ
                            </span>
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
        <div class="text-center" style="margin-top: 30px; margin-bottom: 30px">
            <h1>Thêm sản phẩm vào giỏ đi bạn êi</h1>
            <div class="form-">
                <div class="text-center" style="margin-top: 30px; margin-bottom: 30px">
                    <a href="{{ route('shop') }}"><button class="btn btn-warning">Đi đến cửa hàng lẹ</button></a>
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




