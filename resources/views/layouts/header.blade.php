<style>
    .navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top:0;
    left:100%;
    margin-top:-6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 
.toast-success{
    background-color:#198754 !important;
}
.toast-error{
    background-color:#dc3545 !important;
}
</style>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Miễn phí vận chuyển, bảo hành hoàn trả hoặc hoàn tiền trong 30 ngày.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        @if(Auth::check())
                            <p class="check-auth d-none">1</p>
                            <div class="header__top__hover">
                                <span>{{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    {{-- <li>
                                        <a href="" class="dropdown-item" ><h6>Trang cá nhân</h6></a>
                                    </li> --}}
                                    <li>
                                        <form action="{{route('logout')}}" method="post" class="logout">
                                            @csrf
                                            <button type="submit" class="dropdown-item fw-bold">
                                                <i class="lni lni-enter"></i>
                                                <h6>Đăng xuất</h6>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <p class="check-auth d-none">0</p>
                            <div class="header__top__links">
                                <a href="{{route('login')}}">Đăng nhập</a>
                                <a href="{{route('register')}}">Đăng ký</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo py-2">
                    <a href="/"><img src="/temp/assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu h-100">
                    <ul class="text-nowrap navbar-nav d-flex flex-row h-100 align-items-center">
                        <li class="active"><a href="/">Trang chủ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('products.shop')}}">
                              Cửa hàng
                            </a>
                            <ul class="dropdown-menu position-absolute text-wrap" aria-labelledby="navbarDropdownMenuLink" style="top: 20px">
                                @foreach($menus as $menu)
                                    @if($menu->parent_id == null)
                                    <li class="dropdown-submenu w-100 px-3 py-2">
                                        <a class="dropdown-item dropdown-toggle" href="{{ route('products.showProduct', ['categorySlug' => $menu->slug]) }}">{{$menu->title}}</a>
                                            @if($menu->children->isNotEmpty())
                                            <ul class="dropdown-menu p-3 position-absolute" style="top: 5px">
                                                    @foreach($menu->children as $child)
                                                        <li class="text-nowrap py-2 w-100">
                                                            <a href="{{ route('products.showProduct', ['categorySlug' => $child->slug]) }}">{{$child->title}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="/about">Giới thiệu</a></li>

                        <li><a href="{{route('post')}}">Bài viết</a></li>
                        <li><a href="/contact">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option h-100 d-flex align-items-center justify-content-end">
                    {{-- <a href="#" class="search-switch"><img width="24" src="/temp/assets/img/icon/search.png" alt=""></a> --}}
                    <a href="{{route('carts.index')}}"><img width="24" src="/temp/assets/img/icon/cart.png" alt=""> <span class="text-danger font-weight-bold" style="font-size: 18px">{{ $count_cart }}</span></a>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>