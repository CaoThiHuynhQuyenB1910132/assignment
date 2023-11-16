<div class="leftside-menu">
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="admin1/assets/images/logo.png" alt="" height="16">
        </span>
    </a>
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="admin1/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="admin1/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container">
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Dashboard </span>
                </a>
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('category') }}"  class="side-nav-link">
                            <i class="uil-tag-alt"></i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product') }}"  class="side-nav-link">
                            <i class="uil-food"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order') }}" class="side-nav-link">
                            <i class=" uil-shopping-cart-alt"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user') }} " class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile', \Illuminate\Support\Facades\Auth::user()->id)}}" class="side-nav-link">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>My Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="side-nav-link" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
