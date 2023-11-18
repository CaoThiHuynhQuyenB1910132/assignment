<div  class="home" id="page">
    <header class="header">
        <nav class="wrap-menu-desktop limiter-menu-desktop p-4">
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
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        @if (Auth::check())
                            <div class="heading "></div>
                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                            <li><a href="{{ route('cart.detail') }}">Cart</a></li>
                        @endif

                        <li>
                            @if (Auth::check())
                                <a href="">{{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('account',['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">My Account</a></li>
                                    <li>
                                        <a href="{{ route('order.history') }}">My Order</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            @else
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
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-header">

                <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">
                    <div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
                        @if(Auth::check())
                            <div>
                                <livewire:mini-cart-component wire:key="miniCart"></livewire:mini-cart-component>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </nav>


        <div class="wrap-header-mobile">

            <div class="logo-mobile">
                <a href="{{ route('/') }}"><img src="client/new/images/img/hq.png" alt="IMG-LOGO"></a>
            </div>

            <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
                <div class="wrap-cart-header h-full flex-m m-l-5 menu-click">
                    @if(Auth::check())
                        <div>
                            <livewire:mini-cart-component wire:key="miniCart"></livewire:mini-cart-component>
                        </div>
                    @endif
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
                <li class="active-menu">
                    <a href="{{ route('/') }}">Home</a>
                </li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                    <li><a href="{{ route('cart.detail') }}">Cart</a></li>
                @endif

                <li>
                    @if (Auth::check())
                        <a href="{{ route('account',['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}">My Account</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('order.history') }}">My Order</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else

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
                    @endif
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
</div>
