@extends('client.layouts.app')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/img/intro.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Checkout
                </h2>
                <span class="txt-m-201 cl0 flex-c-m flex-w">
                    <a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                        Home
                    </a>
                    <span>
                        / Checkout
                    </span>
                </span>
            </div>
        </div>
    </section>
<section class="food_section layout_padding-bottom">

    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Menu
            </h2>
        </div>

        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".burger">Burger</li>
            <li data-filter=".pizza">Pizza</li>
            <li data-filter=".pasta">Pasta</li>
            <li data-filter=".fries">Fries</li>
        </ul>

        <div class="filters-content">
            <div class="row grid">
                @foreach($products as $product)
                <div class="col-sm-6 col-lg-4 all">
                    <div class="box">
                        <div>
                            <a href="{{ route('product.detail', ['id' => $product->id])}}" class="img-box">
                                @foreach($product->productImages as $image)
                                    <img src="{{ ('storage/' . $image->image) }}" alt="">
                                @endforeach
                            </a>
                            <div class="detail-box">
                                <h5>
                                    {{$product->name}}
                                </h5>
                                <p>
                                    {{$product->description}}
                                </p>
                                <div class="options">
                                    <h6>
                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                            <del>{{ number_format($product->original_price, 0, '.',
                                                '.') }} VNĐ</del>
                                        </span>
                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                            {{ number_format($product->selling_price, 0, '.',
                                                    '.') }} VNĐ
                                        </span>
                                    </h6>
{{--                                    <a href="{{ route('shop.add', ['id' => $product->id]) }}">--}}
{{--                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                             viewBox="0 0 456.029 456.029"--}}
{{--                                             style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">--}}
{{--                                                <g>--}}
{{--                                                    <g>--}}
{{--                                                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248--}}
{{--                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />--}}
{{--                                                    </g>--}}
{{--                                                </g>--}}
{{--                                            <g>--}}
{{--                                                <g>--}}
{{--                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48--}}
{{--                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064--}}
{{--                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4--}}
{{--                         C457.728,97.71,450.56,86.958,439.296,84.91z" />--}}
{{--                                                </g>--}}
{{--                                            </g>--}}
{{--                                            <g>--}}
{{--                                                <g>--}}
{{--                                                    <path--}}
{{--                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296--}}
{{--                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />--}}
{{--                                                </g>--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="btn-box">
            <a href="">
                View More
            </a>
        </div>
    </div>
</section>

@endsection
