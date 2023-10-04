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

    <section class="bg0 p-t-85 p-b-45">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-4 col-lg-3 m-rl-auto p-b-50">
                    <div class="leftbar p-t-15">

                        <form method="GET" action="{{ route('search') }}" class="size-a-21 pos-relative">
                            <input class="s-full bo-all-1 bocl15 p-rl-20" type="text" name="search"
                                   placeholder="Search products..." value="{{ isset( $search ) ? $search : '' }}">
                            <button type="submit" class="flex-c-m fs-18 size-a-22 ab-t-r hov11">
                                <img class="hov11-child trans-04" src="client/new/images/icons/icon-search.png" alt="ICON">
                            </button>
                        </form>

                        <div class="p-t-45">
                            <h4 class="txt-m-101 cl3">
                                FILTER BY PRICE
                            </h4>
                            <div class="filter-price p-t-32">
                                <div class="wra-filter-bar">
                                    <div id="filter-bar"></div>
                                </div>
                                <div class="flex-sb-m flex-w p-t-16">
                                    <div class="txt-s-115 cl9 p-t-10 p-b-10 m-r-20">
                                        Price: $<span id="value-lower">8</span> - $<span id="value-upper">20</span>
                                    </div>
                                    <div>
                                        <a href="#" class="txt-s-107 cl6 hov-cl10 trans-04">
                                            Filter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Categories
                            </h4>
                            <ul>
                                <li class="p-b-5">
                                    @foreach($categories as $category)
                                    <a href="" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                        <span class="m-r-10">
                                            {{ $category->name }}
                                        </span>
                                    </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>

                        <div class="p-t-40">
                            <h4 class="txt-m-101 cl3 p-b-37">
                                Best sellers
                            </h4>
                            <ul>
                                <li class="flex-w flex-sb-t p-b-30">
                                    <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                        <img src="images/best-sell-01.jpg" alt="IMG">
                                    </a>
                                    <div class="size-w-51 flex-col-l p-t-12">
                                        <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                            Cheery
                                        </a>
                                        <span class="txt-m-104 cl9">
                                            30$
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
                    <div>
                        <div class="flex-w flex-r-m p-b-45 flex-row-rev">
                            <div class="flex-w flex-m p-tb-8">
                                <div class="rs1-select2 bg0 size-w-52 bo-all-1 bocl15 m-tb-7 m-r-15">
                                    <select class="js-select2" name="sort">
                                        <option>Sort by popularity</option>
                                        <option>Sort by best sell</option>
                                        <option>Sort by special</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            <span class="txt-s-101 cl9 m-r-30 size-w-53">
                                Showing 1–12 of 23 results
                            </span>
                        </div>
                        <div class="shop-grid">
                            <div class="row">
                                @foreach($products as $product)

                                <div class="col-sm-6 col-lg-4 p-b-30">
                                    <div class="block1">
                                        <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">

                                            <img src="{{ $product->productImages->count() ? asset('storage/' . $product->productImages[0]->image) : '' }}" alt="{{ $product->name }}">

                                            <div class="block1-content flex-col-c-m p-b-46">
                                                <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                   class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                    {{$product->name}}
                                                </a>
                                                <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                                    {{ CurrencyHelper::format($product->selling_price) }}
                                                </span>
                                                <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                                       class="block1-icon flex-c-m wrap-pic-max-w">
                                                        <img src="client/new/images/icons/icon-view.png" alt="ICON">
                                                    </a>
                                                    <a href="wishlist.html"
                                                       class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                                        <img class="icon-addwish-b1" src="client/new/images/icons/icon-heart.png"
                                                             alt="ICON">
                                                        <img class="icon-addedwish-b1"
                                                             src="client/new/images/icons/icon-heart2.png" alt="ICON">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

