@component('mail::message')
    # Order Details

    __Shipping Address: {{ $shippingAddress }}
    __Total: {{ $total }}
    __Tracking Number: {{ $trackingNumber }}
    __Notes: {{ $notes }}
    __Status: {{ $status }}

    __Order Products:
    @foreach ($orderProducts as $orderProduct)
        - {{ $orderProduct->product->name }} x ({{ $orderProduct->quantity }})
    @endforeach

    Thanks for your order!
    {{ config('app.name') }}
@endcomponent
