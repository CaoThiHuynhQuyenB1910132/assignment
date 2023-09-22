@extends('client.layouts.app')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/img/account.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    History
                </h2>
            </div>
        </div>
    </section>
    <div class="bg0 p-tb-100">
        <div class="container">
        @if ($orders->count() > 0)
            <form class="woocommerce-cart-form">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head bg12">
                            <th class="column-2">#ID</th>
                            <th class="column-2">Shipping Address</th>
                            <th class="column-3">Date Order</th>
                            <th class="column-4">Status</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr class="table_row">
                            <td class="column-2">

                                    <span>
                                        {{ $order->id }}
                                    </span>

                            </td>

                            <td class="column-2">
                                <span>
                                    {{$order->shipping_address}}
                                </span>
                            </td>

                            <td class="column-3">
                                {{$order->created_at->format('d')}} -
                                {{$order->created_at->format('m')}} -
                                {{$order->created_at->format('Y')}}
                                <small>{{ $order->created_at->format('g:i A') }}</small>
                            </td>

                            <td class="column-4">
                                <span class="badge badge-success">
                                        {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </form>
        @else
            <div class="flex-t p-tb-8 m-r-30">
                <img class="m-t-6 m-r-10" src="client/new/images/icons/icon-list.png" alt="IMG">
                <span class="size-w-53 txt-s-101 cl6">
                                                No order has been made yet.
                                            </span>
            </div>
            <a href="{{ route('shop') }}"
               class="flex-c-m txt-s-105 cl0 bg10 size-a-42 hov-btn2 trans-04 p-rl-10 m-tb-8">
                go shop
            </a>
        @endif
        </div>
    </div>
@endsection
