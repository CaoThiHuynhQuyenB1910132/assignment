@extends('client.layouts.app')
@section('content')
    <section class="how-overlay2 bg-img1" style="background-image: url(client/new/images/img/intro.jpg);">
        <div class="container">
            <div class="txt-center p-t-160 p-b-165">
                <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                    Product Detail
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
    <section class="sec-product-detail bg0 p-t-105 p-b-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6">
                    <div class="m-r--30 m-r-0-lg">
                        <div id="slide100-01">
                            <div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
                                <div class="main-frame">
                                    <div class="wrap-main-pic">
                                        <div class="main-pic">
                                            @foreach($product->productImages as $image)
                                                <img src="{{ ('storage/' . $image->image) }}" alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-arrow-slide-100 s-full ab-t-l trans-04">
                                    <span class="my-arrow back prev-slide-100"><i class="fa fa-angle-left m-r-1"
                                                                                  aria-hidden="true"></i></span>
                                    <span class="my-arrow next next-slide-100"><i class="fa fa-angle-right m-l-1"
                                                                                  aria-hidden="true"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-6">
                    <div class="p-l-70 p-t-35 p-l-0-lg">
                        <h4 class="js-name1 txt-l-104 cl3 p-b-16">
                            {{ $product->name }}
                        </h4>
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
                        <div class="flex-w flex-m p-t-30 p-b-27">
                            <span class="fs-16 cl11 lh-15 txt-center m-r-15">
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                                <i class="fa fa-star m-rl-1"></i>
                            </span>
                            <span class="txt-s-115 cl6 p-b-3">
                                (1 customer review)
                            </span>
                        </div>
                        <p class="txt-s-101 cl6">
                            {{$product->description}}
                        </p>
                        <form action="{{ route('add.to.cart', ['id' => $product->id]) }}" method="POST" id="addcart">
                            @csrf
                            <div class="flex-w flex-m p-t-55 p-b-30">
                                <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30">
                                    <div onclick="decQuantity" value="-" class="btn-num-product-down flex-c-m fs-29"></div>
                                    <input class="txt-m-102 cl6 txt-center num-product" type="number" id="quantity" name="quantity"
                                           value="1" readonly>
                                    <div onclick="incQuantity" value="+" class="btn-num-product-up flex-c-m fs-16"></div>
                                </div>
                                <a href="{{ route('add.to.cart', ['id' => $product->id])}}" onclick="event.preventDefault(); document.getElementById('addcart').submit();" class="btn flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30 js-addcart1" >
                                    Add to cart
                                </a>

                            </div>
                        </form>
                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Sku:
                            </span>
                            <span class="cl9">
                                156
                            </span>
                        </div>
                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Category:
                            </span>
                            <span class="cl9">
                                {{$product->category->name}}
                            </span>
                        </div>
                        <div class="txt-s-107 p-b-6">
                            <span class="cl6">
                                Tags:
                            </span>
                            <a href="#" class="txt-s-107 cl9 hov-cl10 trans-04">
                                Healthy,
                            </a>
                            <a href="#" class="txt-s-107 cl9 hov-cl10 trans-04">
                                Organic
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab02 p-t-80">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#info" role="tab">Additional Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (01)</a>
                    </li>
                </ul>

            </div>
        </div>
    </section>

@endsection
