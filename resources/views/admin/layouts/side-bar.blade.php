<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Trang Quản Lý</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('category') ? 'active' : '' }}">
                    <a href="{{ route('category') }}">
                        <i class="fas fa-key"></i>
                        <span> Danh Mục </span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('product') ? 'active' : '' }}">
                    <a href="{{ route('product') }}">
                        <i class="fas fa-suitcase"></i>
                        <span> Sản Phẩm </span>
                    </a>
                </li>



                <li class="{{ request()->routeIs('product-image') ? 'active' : '' }}">
                    <a href="{{ route('product-image') }}">
                        <i class="fas fa-image"></i>
                        <span> Hình Ảnh </span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('cart') ? 'active' : '' }}">
                    <a href="">
                        <i class="fas fa-sd-card"></i>
                        <span> Giỏ hàng </span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('user') ? 'active' : '' }}">
                    <a href="{{ route('user') }}">
                        <i class="fas fa-user"></i>
                        <span> Người Dùng </span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">
                        <i class="fas fa-comments"></i>
                        <span> Liên Hệ </span>
                    </a>
                </li>

{{--                <li>--}}
{{--                    <a href="pricing.html">--}}
{{--                        <i class="far fa-money-bill-alt"></i>--}}
{{--                        <span>Billing</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="settings.html">--}}
{{--                        <i class="fas fa-cog"></i>--}}
{{--                        <span>Settings</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

            </ul>
        </div>
    </div>
</div>
