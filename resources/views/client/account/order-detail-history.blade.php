@extends('client.layouts.app')

@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/img/account.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Order History
                </h2>
            </div>
        </div>
    </section>

    <div class="bg0 p-tb-100">
        <div class="container">
            <form>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head bg12">
                            <th class="column-1 p-l-30">Product</th>
                            <th class="column-2">Price</th>
                            <th class="column-3">Quantity</th>
                            <th class="column-4">Total</th>
                        </tr>

                        @foreach($orderProducts as $orderProduct)
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="flex-w flex-m">
                                    <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                        <img src="{{ $orderProduct->product->productImages->count() ? asset('storage/' . $orderProduct->product->productImages[0]->image) : '' }}">
                                    </div>
                                    <span>
                                        {{ $orderProduct->product->name }}
                                    </span>
                                </div>
                            </td>
                            <td class="column-2">
                                {{ CurrencyHelper::format($orderProduct->product->selling_price) }}
                            </td>
                            <td class="column-3">
                                {{ $orderProduct->quantity }}
                            </td>
                            <td class="column-4">
                                <div class="flex-w flex-sb-m">
                                    <span>
                                        {{ CurrencyHelper::format($orderProduct->product->selling_price * $orderProduct->quantity) }}
                                    </span>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <div class="flex-col-l p-t-68">
                    <span class="txt-m-123 cl3 p-b-18">
                        CART TOTALS
                    </span>
                    <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
                        <span class="size-w-58 txt-m-109 cl3">
                            {{ CurrencyHelper::format($order->total) }}
                        </span>
                    </div>
                    <button class="flex-c-m txt-s-105 cl0 bg10 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43">
                        Repurchase
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
