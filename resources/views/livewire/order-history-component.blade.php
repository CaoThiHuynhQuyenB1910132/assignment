<div>
    <section class="bg0 p-t-85 p-b-45">
        <div class="container">
            <div class="leftbar p-t-15">
                <div class="size-a-11 pos-relative">
                    <input class="s-full bo-all-1 bocl15 p-rl-20" type="text" name="searchTrackingNumber"
                           placeholder="Search your order by tracking number..."
                           wire:model.live.debounce.500ms="searchTrackingNumber"
                    />
                    <button type="submit" class="flex-c-m fs-18 size-a-22 ab-t-r hov11">
                        <img class="hov11-child trans-04" src="client/new/images/icons/icon-search.png" alt="ICON">
                    </button>
                </div>
            </div>
            <div class="tab02 p-t-80">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a wire:click="changeType('all')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'all' ? 'active' : '' }}">All</a>
                    </li>
                    <li class="nav-item">
                        <a  wire:click="changeType('pending')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'pending' ? 'active' : '' }}">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="changeType('accepted')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'accepted' ? 'active' : '' }}">Accepted</a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="changeType('in-delivery')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'in-delivery' ? 'active' : '' }}">In Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="changeType('success')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'success' ? 'active' : '' }}">Success</a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="changeType('cancel')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'cancel' ? 'active' : '' }}">Cancel</a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="changeType('refund')" href="" data-toggle="tab" role="tab" class="nav-link {{ $filterBy == 'refund' ? 'active' : '' }}">Refund</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel" id="">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head bg12">
                                    <th>Order Shipping</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr class="table_row">
                                        <td class="column">
                                                <span>
                                                    #{{ $order->tracking_number }}
                                                </span>
                                            <br>
                                            {{$order->created_at->format('d')}} -
                                            {{$order->created_at->format('m')}} -
                                            {{$order->created_at->format('Y')}}
                                            <small>{{ $order->created_at->format('g:i A') }}</small>
                                            <br>
                                            <span>
                                                    {{$order->shipping_address}}
                                                </span>
                                        </td>
                                        <td class="column">
                                            <a href="{{ route('order.detail.history', ['id' => $order->id]) }}">
                                                <button style="color: #0a6aa1">Detail</button>
                                            </a>
                                            @if($order->status == 'pending')
                                                <a href="{{ route('order.cancel', ['id' => $order->id]) }}" onclick="return confirm('Are you sure you want to cancel this product?')">
                                                    <i class="fa fa-trash-o" style="color: darkred"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @if(! $orders->count())
                            <div class="flex-t p-tb-8 m-r-30">
                                <img class="m-t-6 m-r-10" src="client/new/images/icons/icon-list.png" alt="IMG">
                                <tr class="text-center">
                                    <td colspan="100%">Not have orders</td>
                                </tr>
                            </div>

                        @endif
                    </div>
{{--                    {{ $orders->links() }}--}}
                </div>
            </div>
        </div>
    </section>
    <style>
        .tab-active{
            background-color: white;
            color: #81b03f !important;
        }
    </style>
</div>
