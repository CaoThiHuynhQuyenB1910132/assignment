@extends('client.layouts.app')
@section('content')
    <div wire:ignore.self>
        <livewire:product-detail :productId="$product->id" wire:key="addToCart{{ $product->name }}"></livewire:product-detail>
    </div>

    <section class="sec-related bg0 p-b-85">
        <div class="container">

            <div class="wrap-slick9">
                <div class="flex-w flex-sb-m p-b-33 p-rl-15">
                    <h3 class="txt-l-112 cl3 m-r-20 respon1 p-tb-15">
                        RELATED PRODUCTS
                    </h3>
                    <div class="wrap-arrow-slick9 flex-w m-t-6"></div>
                </div>
                <div class="slick9">
                    @foreach ($randomProducts as $product)
                        <div class="item-slick9 p-all-15">

                            <div class="block1">
                                <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                    <img src="{{ $product->productImages->count() ? asset('storage/' . $product->productImages[0]->image) : '' }}">
                                    <div class="block1-content flex-col-c-m p-b-46">
                                        <a href="product-single.html"
                                           class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                            {{ $product->name }}
                                        </a>
                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                            <del>{{ CurrencyHelper::format($product->original_price) }}</del>
                                        </span>
                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
                                            {{ CurrencyHelper::format($product->selling_price) }}
                                        </span>
                                    </span>
                                        <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}"
                                               class="block1-icon flex-c-m wrap-pic-max-w">
                                                <img src="client/new/images/icons/icon-view.png" alt="ICON">
                                            </a>

                                            <div wire:ignore.self>
                                                <livewire:add-cart-component :productId="$product->id" wire:key="addCart{{ $product->name }}"></livewire:add-cart-component>
                                            </div>
                                            <div wire:ignore.self>
                                                <livewire:wishlist-component :productId="$product->id" wire:key="wishlist{{ $product->name }}"></livewire:wishlist-component>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <style>
        .image-container {
            width: 530px;
            height: 525px;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
@endsection

