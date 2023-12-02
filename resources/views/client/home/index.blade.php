@extends('client.layouts.app')

@section('content')
    <section class="sec-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container">
            <div id="rev_slider_3" class="rev_slide fullwidthabanner" data-version="5.4.5" style="display:none">
                <ul>

                    <li data-transition="fade">

                        <img src="{{ asset('client/new/images/hero-bg.jpg') }}" alt="IMG-BG" class="rev-slidebg">

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer1"
                             data-frames='[{"delay":1700,"speed":1500,"frame":"0","from":"y:-150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-115', '-95', '-85', '-120']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="{{ asset('client/new/images/icons/symbol-19.png') }}" alt="IMG">
                        </div>

                        <h2 class="tp-caption tp-resizeme layer2"
                            data-frames='[{"delay":500,"split":"chars","splitdelay":0.05,"speed":1300,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['150', '120', '100', '80']"
                            data-lineheight="['165', '130', '110', '82']" data-color="['#fff']"
                            data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                            data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                            data-voffset="['30', '30', '20', '0']" data-width="['960','960','768','576']"
                            data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                            data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                            data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                            Fast Food
                        </h2>

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer3"
                             data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"y:150px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['190', '170', '150', '130']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="{{ asset('client/new/images/icons/symbol-18.png') }}" alt="IMG">
                        </div>
                    </li>

                    <li data-transition="fade">

                        <img src="{{ asset('client/new/images/account.jpg') }}" alt="IMG-BG" class="rev-slidebg">

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer1"
                             data-frames='[{"delay":1700,"speed":1300,"frame":"0","from":"x:300px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['-115', '-95', '-85', '-120']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="{{ asset('client/new/images/icons/symbol-19.png') }}" alt="IMG">
                        </div>

                        <h2 class="tp-caption tp-resizeme layer2"
                            data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-visibility="['on', 'on', 'on', 'on']" data-fontsize="['150', '120', '100', '80']"
                            data-lineheight="['165', '130', '110', '82']" data-color="['#fff']"
                            data-textAlign="['center', 'center', 'center', 'center']" data-x="['center']"
                            data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                            data-voffset="['30', '30', '20', '0']" data-width="['960','960','768','576']"
                            data-height="['auto']" data-whitespace="['normal']" data-paddingtop="[0, 0, 0, 0]"
                            data-paddingright="[15, 15, 15, 15]" data-paddingbottom="[0, 0, 0, 0]"
                            data-paddingleft="[15, 15, 15, 15]" data-basealign="slide" data-responsive_offset="on">
                            Fast Food
                        </h2>

                        <div class="tp-caption tp-resizeme flex-c-m flex-w layer3"
                             data-frames='[{"delay":2500,"speed":1300,"frame":"0","from":"x:-300px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                             data-x="['center']" data-y="['center']" data-hoffset="['0', '0', '0', '0']"
                             data-voffset="['190', '170', '150', '130']" data-width="['960','960','768','576']"
                             data-height="['auto']" data-paddingtop="[0, 0, 0, 0]" data-paddingright="[15, 15, 15, 15]"
                             data-paddingbottom="[0, 0, 0, 0]" data-paddingleft="[15, 15, 15, 15]" data-basealign="slide"
                             data-responsive_offset="on">
                            <img src="{{ asset('client/new/images/icons/symbol-18.png') }}" alt="IMG">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="sec-item flex-w">
        @foreach($categories as $category)
            <div class="of-hidden size-w-2 respon2">
                <div class="hov-img1 pos-relative">
                    <img src="{{ ('storage/' . $category->image) }}" alt="IMG">
                    <a href="shop-product-grid.html" class="s-full ab-t-l flex-col-c-m bg11 p-all-15 hov1-parent">
                        <div class="wrap-pic-max-w">
                            <img src="{{ asset('client/new/images/icons/symbol-29.png') }}" alt="IMG">
                        </div>
                        <span class="txt-l-102 cl0 txt-center p-t-30 p-b-13">
                            {{ $category->name }}
                        </span>
                        <div class="hov1 trans-04">
                            <div class="txt-m-102 cl0 txt-center hov1-child trans-04">
                                - {{$category->products->count()}} Items -
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <section class="sec-specical-product bg0 p-t-145 p-b-80 p-rl-60 p-rl-0-xl">
        <div class="size-a-1 flex-col-c-m p-b-55">
            <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                Featured Products
                <div class="how-pos1">
                    <img src="{{ asset('client/new/images/icons/symbol-02.png') }}" alt="IMG">
                </div>
            </div>
            <h3 class="txt-center txt-l-101 cl3 respon1">
                Our special products
            </h3>
        </div>

        <div class="wrap-slick5">
            <div class="slick5">
                @foreach($products as $product)
                    <div class="item-slick5 p-all-15">
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="{{ $product->productImages->count() ? asset('storage/' . $product->productImages[0]->image) : asset('images/empty-state.png') }}">
                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="{{ route('product.detail',['id' => $product->id]) }}"
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
                                        <a href="{{ route('product.detail',['id' => $product->id]) }}" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="{{ asset('client/new/images/icons/icon-view.png') }}" alt="ICON">
                                        </a>
                                        <div>
                                            <livewire:add-cart-component :productId="$product->id" wire:key="addCart{{ $product->name }}"></livewire:add-cart-component>
                                        </div>
                                        <div>
                                            <livewire:wishlist-component :productId="$product->id" wire:key="wishlist{{ $product->name }}"></livewire:wishlist-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="wrap-dot-slick5 p-rl-15 p-t-40"></div>
        </div>
    </section>
@endsection
