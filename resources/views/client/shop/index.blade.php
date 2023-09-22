@extends('client.layouts.app')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/img/piza.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Our Menu
                </h2>
            </div>
        </div>
    </section>
    <section class="food_section layout_padding-bottom">

    <div class="container">


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
                                @if($product->productImages->count())
                                    <img src="{{ asset('storage/' . $product->productImages[0]->image) }}"
                                         alt="{{ $product->name }}" title="{{ $product->name }}">
                                @endif
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
