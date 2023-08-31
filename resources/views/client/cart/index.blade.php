@extends('client.layouts.app')
@section('content')

    <div class="bg0 p-tb-100">
        <div class="container">
            @if( $carts -> count() > 0 )
                @php $total = 0; @endphp
            <form class="woocommerce-cart-form">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head bg12">
                            <th class="column-1 p-l-30">Product</th>
                            <th class="column-2">Price</th>
                            <th class="column-3">Quantity</th>
                            <th class="column-4">Total</th>
                            <th class="column-5"></th>
                        </tr>
                        @foreach($carts as $product)
                            @php
                                $total += $product->product->selling_price * $product->quantity;
                            @endphp

                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="flex-w flex-m">
                                            <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                                @foreach($product->product->productImages as $image)
                                                    <img src="{{ ('storage/' . $image->image) }}" alt="">
                                                @endforeach
                                            </div>
                                            <span>
                                        {{$product->product->name}}
                                    </span>
                                        </div>
                                    </td>
                                    <td class="column-2">
                                         <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                    {{ number_format($product->product->selling_price, 0, '.',
                                                            '.') }} VNĐ
                                         </span>
                                    </td>
                                    <td class="column-3">
                                        <div class="wrap-num-product flex-w flex-m bg12 p-rl-10">
                                            <div class="input-group-prepend">
                                                <button data-dec-product-id="{{ $product->id }}" id="decrease" class="decrease btn-num-product-down flex-c-m fs-29"></button>
                                            </div>

                                            <input class="txt-m-102 cl6 txt-center num-product" type="text" id="quantity" name="quantity" value="{{$product->quantity}}" readonly>

                                            <div class="input-group-prepend">
                                                <button data-inc-product-id="{{ $product->id }}" id="increase" class="increase btn-num-product-up flex-c-m fs-16"></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-4">
                                        <div class="flex-w flex-sb-m">
                                            <span>
                                                {{ number_format($product->product->selling_price * $product->quantity, 0, '.',
                                            '.') }} VNĐ
                                            </span>
                                        </div>
                                    </td>
                                    <td class="column-5">
                                        <div class="fs-15 hov-cl10 pointer">
                                            <a class="lnr lnr-cross" href="{{ route('cart.delete', ['id' => $product->id]) }} "></a>
                                        </div>
                                    </td>
                                </tr>
                            </form>
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

                <div class="flex-w flex-sb-m p-t-20">
                    <div class="flex-w flex-m m-r-50 m-tb-10">
                        <input class="size-a-31 bo-all-1 bocl15 txt-s-123 cl6 plh1 p-rl-20 focus1 m-r-30 m-tb-10"
                               type="text" name="coupon" placeholder="Coupon Code">
                        <div class="flex-c-m txt-s-105 cl0 bg10 size-a-32 hov-btn2 trans-04 pointer p-rl-10 m-tb-10">
                            apply coupon
                        </div>
                    </div>
                </div>

            </form>
            @else
                <tr class="text-center">
                    <td colspan="100%">Not have products</td>
                </tr>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.increase').on('click', function(e) {
            e.preventDefault()
            let id = $(this).data('inc-product-id');
            console.log(id)

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'PUT',
                data: {
                    id: id,
                    type: 'inc',
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    location.reload()
                },
                error: function (error) {
                    console.log(error)
                }
            })
        });
    </script>

    <script type="text/javascript">
        $('.decrease').on('click', function(e) {
            e.preventDefault()
            let id = $(this).data('dec-product-id');

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'PUT',
                data: {
                    id: id,
                    type: 'dec',
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    location.reload()
                },
                error: function (error) {
                    console.log(error)
                }
            })
        });
    </script>
@endsection
