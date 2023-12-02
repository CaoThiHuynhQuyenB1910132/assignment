<div>
    <section class="how-overlay2 bg-img4" style="background-image: url(client/new/images/cartdetail.png);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Cart Detail
                </h2>
            </div>
        </div>
    </section>

    <div class="bg0 p-tb-100">
        <div class="container">
            @if( $carts -> count() > 0 )
                @php $total = 0; @endphp
                <div class="woocommerce-cart-form">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head bg12">
                                <th class="column-1 p-l-30">Product Name</th>
                                <th class="column-2">Price</th>
                                <th class="column-3">Quantity</th>
                                <th class="column-4">Total</th>
                                <th class="column-5"></th>
                            </tr>
                            @foreach($carts as $product)
                                @php
                                    $total += $product->product->selling_price * $product->quantity;
                                @endphp
                                <div>
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="flex-w flex-m">
                                                <a href="{{ route('product.detail', ['id' => $product->product->id]) }}" class="wrap-pic-w size-w-40 bo-all-1 bocl12 m-r-30">
                                                    <img src="{{ $product->product->productImages->count() ? asset('storage/' . $product->product->productImages[0]->image) : asset('images/empty-state.png') }}">
                                                </a>
                                                <span>
                                                        {{$product->product->name}}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="column-2">
                                         <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                    {{ CurrencyHelper::format($product->product->selling_price) }}
                                         </span>
                                        </td>

                                        <td class="column-3">
                                            @if($product->product->stock == 1)
                                                <div class="wrap-num-product flex-w flex-m bg12 p-rl-10">
                                                    <div class="input-group-prepend">
                                                        <button wire:click="decQuantity({{$product->product->id}})" id="decrease" class="btn-num-product-down flex-c-m fs-29"></button>
                                                    </div>

                                                    <input class="txt-m-102 cl6 txt-center num-product" type="text" id="quantity" name="quantity" value="{{$product->quantity}}" readonly>

                                                    <div class="input-group-prepend">
                                                        <button wire:click="incQuantity({{$product->product->id}})" id="increase" class="btn-num-product-up flex-c-m fs-16"></button>
                                                    </div>
                                                </div>
                                            @else
                                                <span>Out of stock</span>
                                            @endif
                                        </td>

                                        <td class="column-4">
                                            <div class="flex-w flex-sb-m">
                                            <span>
                                                {{ CurrencyHelper::format($product->product->selling_price * $product->quantity) }}
                                            </span>
                                            </div>
                                        </td>

                                        <td class="column-5">
                                            <div class="fs-15 hov-cl10 pointer" wire:click="deleteCartProduct({{$product->product->id}})">
                                                <a class="lnr lnr-cross"></a>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        </table>

                    </div>

                    <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
                    <span class="size-w-58 txt-m-109 cl3">
                            Total
                    </span>
                        <span class="size-w-59 txt-m-104 cl10">
                          {{ number_format($total, 0, '.','.') }} VNĐ
                    </span>
                    </div>

                    <a href="{{ route('checkout') }}" class="flex-c-m txt-s-105 cl0 bg10 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43 w-25" >
                        proceed to checkout
                    </a>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <div class="flex-t p-tb">
                            <img class="m-t-6 m-r-10" src="client/new/images/icons/icon-list.png" alt="IMG">
                            <span class="size-w-53 txt-s-101 cl6">
                                            shopping cart is empty.
                                        </span>
                        </div>
                        <a href="{{ route('shop') }}"
                           class="flex-c-m txt-s-105 cl0 bg10 size-a-32 hov-btn2 trans-04 m-tb-8 justify-center">
                            go shop
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
