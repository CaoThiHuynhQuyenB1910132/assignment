<x-mail::message>
    # Order Shipped

    ## Your Order
    ## {{ $shippingAddress }}## {{ $total }}## {{ $trackingNumber }}## {{ $notes }}## {{ $status }}

    @component('mail::table')

        |Product  |QTY  |Price   |
        |---------|-----|--------|
        |Computer |1    |   $1600|
        |Phone    |1    |     $12|
        |Dongle   |24   |   $2400|
        |&nbsp;        |Total|$4012.00|

    @endcomponent

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
