<div>
    @php $total = 0; @endphp
    <div class="h-full flex-m">
        <div class="icon-header-item flex-c-m trans-04 icon-header-noti"
             data-notify="@if(Auth::check())
                            {{ $count }}
                          @endif">
            <img src="{{ asset('client/new/images/icons/icon-cart-2.png')  }}" alt="CART">
        </div>
    </div>

    <div class="cart-header menu-click-child trans-04">
        <div class="bo-b-1 bocl15">
            <div class="size-h-2 js-pscroll m-r--15 p-r-15">
                @foreach($carts as $product)
                    @php
                        $total += $product->product->selling_price * $product->quantity;
                    @endphp
                <div class="flex-w flex-str m-b-25">
                    <div class="size-w-15 flex-w flex-t">
                        <a href="{{ route('product.detail',['id' => $product->product->id]) }}"
                           class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                            <img src="{{ $product->product->productImages->count() ? asset('storage/' . $product->product->productImages[0]->image) : asset('images/empty-state.png') }}">
                        </a>
                        <div class="size-w-17 flex-col-l">
                            <a href="{{ route('product.detail',['id' => $product->product->id]) }}"
                               class="txt-s-108 cl3 hov-cl10 trans-04">
                                {{ $product->product->name }}
                            </a>
                            <span class="txt-s-101 cl9">
                                {{ CurrencyHelper::format($product->product->selling_price) }}
                            </span>

                            <span class="txt-s-109 cl12">
                                x {{ $product->quantity }}
                            </span>
                        </div>
                    </div>
                    <div class="size-w-14 flex-b">
                        <div class="fs-15 hov-cl10 pointer" wire:click="deleteMiniCartProduct({{$product->product->id}})" wire:confirm="Are you sure you want to delete this product?">
                            <a class="lnr lnr-cross"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex-w flex-sb-m p-b-31">
            <span class="txt-m-103 cl3 p-r-20">
                Total
            </span>

            <span class="txt-m-111 cl10">
                {{ number_format($total, 0, '.','.') }} VNĐ
            </span>
        </div>

        <div class="d-flex">
            <a href="{{ route('cart.detail') }}"
               class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                View Cart
            </a>

            <a href="{{ route('checkout') }}"
               class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04 ml-1">
                Checkout
            </a>
        </div>
    </div>
</div>
