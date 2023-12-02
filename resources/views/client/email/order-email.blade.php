{{--# Order Shipped--}}

{{--## Your Order--}}
{{--{{ $shippingAddress }} | {{ $total }} | {{ $trackingNumber }} | {{ $notes }} | {{ $status }}--}}

{{--| Product  | QTY | Price   |--}}
{{--| -------- | --- | ------- |--}}
{{--| Computer | 1   | $1600   |--}}
{{--| Phone    | 1   | $12     |--}}
{{--| Dongle   | 24  | $2400   |--}}
{{--| Total    |     | $4012.00 |--}}

{{--Thanks,--}}
{{--{{ config('app.name') }}--}}
@component('mail::message')
    # Xin chào,

    Đơn hàng {{ $trackingNumber }} của bạn đã được gửi đi
    - Địa chỉ: {{ $shippingAddress }}
    - Giá: {{ $total }}

    @component('mail::button', ['url' => 'https://example.com'])
        Chi tiết đơn hàng
    @endcomponent

    Cảm ơn bạn,
    {{ config('app.name') }}
@endcomponent
