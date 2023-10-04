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
        @if ($orders->count() > 0)
            <form class="woocommerce-cart-form">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head bg12">
                            <th style="width: 20%">ID</th>
                            <th style="width: 40%">Shipping Address</th>
                            <th style="width: 30%">Date Order</th>
                            <th style="width: 10%">Status</th>
                            <th >Action</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr class="table_row">
                            <td class="column-2">

                                    <span>
                                        #{{ $order->tracking_number }}
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

                            @if( $order->status === 'pending')
                                <td><span class="badge badge-info">pending</span></td>
                            @elseif($order->status === 'accepted')
                                <td><span class="badge badge-success">accepted</span></td>
                            @elseif($order->status === 'in-delivery')
                                <td><span class="badge badge-light">in delivery</span></td>
                            @elseif($order->status === 'success')
                                <td><span class="badge badge-success">success</span></td>
                            @elseif($order->status === 'cancel')
                                <td><span class="badge badge-danger">cancel</span></td>
                            @elseif($order->status === 'refund')
                                <td><span class="badge badge-warning">refund</span></td>
                            @endif

                            <td>
                                <a href="{{ route('order.detail.history', ['id' => $order->id]) }}" class="fs-15 hov-cl10 pointer text-warning">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if($order->status == 'pending')
                                <a href="{{ route('order.cancel', ['id' => $order->id]) }}" class="fs-15 hov-cl10 pointer ml-3 text-danger">
                                    <i class="lnr lnr-cross" href=""></i>
                                </a>
                                @endif
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
                   class="flex-c-m txt-s-103 cl6 size-a-2 how-btn1 bo-all-1 bocl11 hov-btn1 trans-04">
                    Shop now
                    <span class="lnr lnr-chevron-right m-l-7"></span>
                    <span class="lnr lnr-chevron-right"></span>
                </a>
        @endif
        </div>
    </div>
@endsection
