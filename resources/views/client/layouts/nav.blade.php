<header class="header-v2">

    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop">
                <div class="left-header">

                    <div class="logo">
                        <a href="{{ route('/') }}"><img src="client/new/images/img/hq.jpg" alt="IMG-LOGO"></a>
                    </div>
                </div>
                <div class="center-header">

                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{ route('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">Page</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('checkout') }}">CheckOut</a></li>
                                    <li><a href="{{ route('account') }}">My Account</a></li>
                                    <li><a href="account-lost-pass.html">My Account Lost Pass</a></li>
                                    <li><a href="account-register.html">My Account Register</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('shop') }}">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-sidebar-grid.html">Shop Sidebar Grid</a></li>
                                    <li><a href="shop-sidebar-list.html">Shop Sidebar List</a></li>
                                    <li><a href="shop-product-grid.html">Shop Product Grid</a></li>
                                    <li><a href="shop-product-list.html">Shop Product List</a></li>
                                    <li><a href="product-single.html">Product Single</a></li>
                                    <li><a href="shop-cart.html">Shop Cart</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="contact-01.html">Contact</a>
                                <ul class="sub-menu">
                                    <li><a href="contact-01.html">Contact 1</a></li>
                                    <li><a href="contact-02.html">Contact 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="user_link">My Account</a>
                                <ul class="sub-menu">
                                    @if (Auth::check())
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{route('login')}}">Login</a>

                                        </li>
                                        <li>
                                            <a href="{{route('register')}}">Register</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right-header">

                    <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">
                        <div class="h-full flex-m">
                            <div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
                                <img src="client/new/images/icons/icon-search2.png" alt="SEARCH">
                            </div>
                        </div>
                        <div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
                            <a href="{{ route('cart.detail') }}" class="icon-header-item flex-c-m trans-04 icon-header-noti"
                               data-notify="@if(Auth::check())
                                                {{!is_null(\App\Models\Cart::where('user_id', Auth::user()->id)->get()) ? count(\App\Models\Cart::where('user_id', Auth::user()->id)->get()) : 0 }}
                                            @endif">
                                <img src="client/new/images/icons/icon-cart-3.png" alt="CART">
                            </a>
                            <div class="cart-header menu-click-child trans-04">
                                <div class="bo-b-1 bocl15">
                                    <div class="size-h-2 js-pscroll m-r--15 p-r-15">

                                        <div class="flex-w flex-str m-b-25">
                                            <div class="size-w-15 flex-w flex-t">
                                                <a href="product-single.html"
                                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                    <img src="client/new/images/item-cart-01.jpg" alt="PRODUCT">
                                                </a>
                                                <div class="size-w-17 flex-col-l">
                                                    <a href="product-single.html"
                                                       class="txt-s-108 cl3 hov-cl10 trans-04">
                                                        Cheery
                                                    </a>
                                                    <span class="txt-s-101 cl9">
                                                            18$
                                                        </span>
                                                    <span class="txt-s-109 cl12">
                                                            x2
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="size-w-14 flex-b">
                                                <button class="lh-10">
                                                    <img src="client/new/images/icons/icon-close.png" alt="CLOSE">
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex-w flex-str m-b-25">
                                            <div class="size-w-15 flex-w flex-t">
                                                <a href="product-single.html"
                                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                    <img src="client/new/images/item-cart-02.jpg" alt="PRODUCT">
                                                </a>
                                                <div class="size-w-17 flex-col-l">
                                                    <a href="product-single.html"
                                                       class="txt-s-108 cl3 hov-cl10 trans-04">
                                                        Asparagus
                                                    </a>
                                                    <span class="txt-s-101 cl9">
                                                            12$
                                                        </span>
                                                    <span class="txt-s-109 cl12">
                                                            x1
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="size-w-14 flex-b">
                                                <button class="lh-10">
                                                    <img src="client/new/images/icons/icon-close.png" alt="CLOSE">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-sb-m p-t-22 p-b-12">
                                        <span class="txt-m-103 cl3 p-r-20">
                                            Subtotal
                                        </span>
                                    <span class="txt-m-111 cl6">
                                            48$
                                        </span>
                                </div>
                                <div class="flex-w flex-sb-m p-b-31">
                                        <span class="txt-m-103 cl3 p-r-20">
                                            Total
                                        </span>
                                    <span class="txt-m-111 cl10">
                                            48$
                                        </span>
                                </div>

                                <a href="{{ route('checkout') }}"
                                   class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                    check out
                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="wrap-header-mobile">

        <div class="logo-mobile">
            <a href="{{ route('/') }}"><img src="client/new/images/img/hq.png" alt="IMG-LOGO"></a>
        </div>

        <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
            <div class="h-full flex-m">
                <div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
                    <img src="client/new/images/icons/icon-search.png" alt="SEARCH">
                </div>
            </div>
            <div class="wrap-cart-header h-full flex-m m-l-5 menu-click">
                <div class="icon-header-item flex-c-m trans-04 icon-header-noti" data-notify="2">
                    <img src="client/new/images/icons/icon-cart-2.png" alt="CART">
                </div>
                <div class="cart-header menu-click-child trans-04">
                    <div class="bo-b-1 bocl15">

                        <div class="flex-w flex-str m-b-25">
                            <div class="size-w-15 flex-w flex-t">
                                <a href=""
                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                    <img src="client/new/images/item-cart-01.jpg" alt="PRODUCT">
                                </a>
                                <div class="size-w-17 flex-col-l">
                                    <a href="product-single.html" class="txt-s-108 cl3 hov-cl10 trans-04">
                                        Cheery
                                    </a>
                                    <span class="txt-s-101 cl9">
                                            18$
                                        </span>
                                    <span class="txt-s-109 cl12">
                                            x2
                                        </span>
                                </div>
                            </div>
                            <div class="size-w-14 flex-b">
                                <button class="lh-10">
                                    <img src="client/new/images/icons/icon-close.png" alt="CLOSE">
                                </button>
                            </div>
                        </div>

                        <div class="flex-w flex-str m-b-25">
                            <div class="size-w-15 flex-w flex-t">
                                <a href="product-single.html"
                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                    <img src="client/new/images/item-cart-02.jpg" alt="PRODUCT">
                                </a>
                                <div class="size-w-17 flex-col-l">
                                    <a href="product-single.html" class="txt-s-108 cl3 hov-cl10 trans-04">
                                        Asparagus
                                    </a>
                                    <span class="txt-s-101 cl9">
                                            12$
                                        </span>
                                    <span class="txt-s-109 cl12">
                                            x1
                                        </span>
                                </div>
                            </div>
                            <div class="size-w-14 flex-b">
                                <button class="lh-10">
                                    <img src="client/new/images/icons/icon-close.png" alt="CLOSE">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex-w flex-sb-m p-t-22 p-b-12">
                            <span class="txt-m-103 cl3 p-r-20">
                                Subtotal
                            </span>
                        <span class="txt-m-111 cl6">
                                48$
                            </span>
                    </div>
                    <div class="flex-w flex-sb-m p-b-31">
                            <span class="txt-m-103 cl3 p-r-20">
                                Total
                            </span>
                        <span class="txt-m-111 cl10">
                                48$
                            </span>
                    </div>
                    <a href="{{ route('checkout') }} } class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                        check out
                    </a>
                </div>
            </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
        </div>
    </div>

    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{ route('/') }}">Home</a>
                <ul class="sub-menu-m">

                </ul>
                <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
            </li>
            <li>
                <a href="#">Page</a>
                <ul class="sub-menu-m">
                    <li><a href="checkout.html">CheckOut</a></li>
                    <li><a href="account.html">My Account</a></li>
                    <li><a href="account-lost-pass.html">My Account Lost Pass</a></li>
                    <li><a href="account-register.html">My Account Register</a></li>
                    <li><a href="wishlist.html">Wishlist</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
            </li>
            <li>
                <a href="shop-sidebar-grid.html">Shop</a>
                <ul class="sub-menu-m">
                    <li><a href="shop-sidebar-grid.html">Shop Sidebar Grid</a></li>
                    <li><a href="shop-sidebar-list.html">Shop Sidebar List</a></li>
                    <li><a href="shop-product-grid.html">Shop Product Grid</a></li>
                    <li><a href="shop-product-list.html">Shop Product List</a></li>
                    <li><a href="product-single.html">Product Single</a></li>
                    <li><a href="shop-cart.html">Shop Cart</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
            </li>


            <li>
                <a href="contact-01.html">Contact</a>
                <ul class="sub-menu-m">
                    <li><a href="contact-01.html">Contact 1</a></li>
                    <li><a href="contact-02.html">Contact 2</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
            </li>

        </ul>
    </div>

    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <span class="lnr lnr-cross"></span>
        </button>
        <div class="container-search-header">
            <form class="wrap-search-header flex-w">
                <button class="flex-c-m trans-04">
                    <span class="lnr lnr-magnifier"></span>
                </button>
                <input class="plh1" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
