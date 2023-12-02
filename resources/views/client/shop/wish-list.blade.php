@extends('client.layouts.app')

@section('content')

    <section class="how-overlay2 bg-img1" style="background-image: url({{ asset('client/new/images/wishlist.png') }});">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Wishlist
                </h2>
            </div>
        </div>
    </section>

    <div class="bg0 p-t-100 p-b-80">
        <div class="container">
            <div class="wrap-table-shopping-cart rs1-table">
                <table class="table-shopping-cart">
                    @if($wishlists->count() > 0)
                    <tr class="table_head bg12">
                        <th class="column-1 p-l-30">Product Name</th>
                        <th class="column-2">Price</th>
                        <th class="column-3">Stock Status</th>
                        <th class="column-4">Add to cart</th>
                    </tr>

                        @foreach($wishlists as $wishlist)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="flex-w flex-m">
                                        <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                            <img src="{{ $wishlist->product->productImages->count() ? asset('storage/' . $wishlist->product->productImages[0]->image) : asset('images/empty-state.png') }}">
                                        </div>
                                        <span>
                                        {{ $wishlist->product->name }}
                                    </span>
                                    </div>
                                </td>
                                <td class="column-2">
                                    {{ CurrencyHelper::format($wishlist->product->selling_price) }}
                                </td>
                                <td class="column-3">
                                    <div class="flex-t">
                                        <img class="m-t-4 m-r-8" src="client/new/images/icons/icon-list3.png" alt="IMG">

                                        <span class="size-w-53 txt-m-104 cl6">{{ $wishlist->product->stock == 1 ? 'In Stock' : 'Out Stock' }}</span>

                                    </div>
                                </td>
                                <td class="column-4">
                                    <div class="flex-w flex-sb-m">
                                        <a href="{{ route('cart.detail') }}"
                                           class="flex-c-m txt-s-103 cl6 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04">
                                            Buy now
                                            <span class="lnr lnr-chevron-right m-l-7"></span>
                                            <span class="lnr lnr-chevron-right"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="100%">Not have products</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection
