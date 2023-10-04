<x-mail::message>
    # Order Shipped

    ## Your Order

{{--    <x-mail::button :url="$total" color="success">--}}
{{--        View Order--}}
{{--    </x-mail::button>--}}

    <x-mail::table>
        | Product       | Quantity         | Price  |
        | ------------- |:-------------:| --------:|
        | {{ $ }}      | Centered      | $10      |
        | Col 3 is      | Right-Aligned | $20      |
    </x-mail::table>

    ## {{ $shippingAddress }}## {{ $total }}## {{ $trackingNumber }}## {{ $notes }}## {{ $status }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
