@extends('layouts.layout')
@section('content')
<style>
    .owl-next, .owl-prev{
        background: #ffffff69 !important;
        border-radius: 5px;

    }
</style>
<section class="hero">
    <div class="hero__slider owl-carousel owl-loaded owl-drag">
        
        
    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3794px, 0px, 0px); transition: all; width: 11382px;"><div class="owl-item cloned" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-1.jpg" style="background-image: url('/temp/assets/img/hero/hero-1.jpg');">
            
        </div></div><div class="owl-item cloned" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-2.jpg" style="background-image: url('/temp/assets/img/hero/hero-2.jpg');">
            
        </div></div><div class="owl-item active" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-1.jpg" style="background-image: url('/temp/assets/img/hero/hero-1.jpg');">
            
        </div></div><div class="owl-item" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-2.jpg" style="background-image: url('/temp/assets/img/hero/hero-2.jpg');">
            
        </div></div><div class="owl-item cloned" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-1.jpg" style="background-image: url('/temp/assets/img/hero/hero-1.jpg');">
            
        </div></div><div class="owl-item cloned" style="width: 1897px;"><div class="hero__items set-bg" data-setbg="/temp/assets/img/hero/hero-2.jpg" style="background-image: url('/temp/assets/img/hero/hero-2.jpg');">
            
        </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="arrow_left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="arrow_right"><span></span></span></button></div><div class="owl-dots disabled"></div></div>
</section>

<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img class="img-banner" height="420" src="/temp/assets/img/banner/banner-1.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Gimbal Q04 kèm đèn HULAKO Hot Nhất</h2>
                        <a href="/shop">Khám phá cửa hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img class="img-banner" height="420" src="/temp/assets/img/banner/banner-2.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Sạc Dự Phòng Mini 30000/20000mAh 35W hấp dẫn</h2>
                        <a href="/shop">Khám phá cửa hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-4">
                <div class="banner__item banner__item--last mt-0 ">
                    <div class="banner__item__pic">
                        <img class="img-banner" height="420" src="/temp/assets/img/banner/banner-3.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Ưu đãi Tai nghe bluetooth Rockspace Retro TWS</h2>
                        <a href="/shop">Khám phá cửa hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Sản phẩm mới</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter" id="MixItUp086433">
            @foreach($product_hots as $product)
                <div id="product-infor-list-{{$product->id}}" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals product-infor-main">
                    <input type="number" hidden class="quantity" value="1">
                    <div class="product__item">
                        <div class="product__item__pic set-bg position-relative" data-setbg="/temp/images/product/{{$product->thumb}}">
                            <img class="thumb-product d-none" src="/temp/images/product/{{$product->thumb}}" alt="{{$product->title}}">
                            <a href="{{ route('products.details', ['slug' =>$product->slug]) }}" class="detail-product-bg position-absolute" style="bottom: 0; top: 0; right: 0; left: 0"></a>
                            <a href="" class="badge badge-warning position-relative z-20">{{$product->Category->title ?? ''}}</a>
                            <ul class="product__hover">
                                <li><a href="{{ route('products.details', ['slug' =>$product->slug]) }}"><img src="/temp/assets/img//icon/search.png" alt=""><span>Chi tiết</span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6 class="my-2 title-product">{{$product->Title}}</h6>
                            <a data-user-id="{{ Auth::id() }}" data-product-id="{{$product->id}}" data-quantity="{{ $product->Amounts }}" href="{{ route('products.details', ['slug' =>$product->slug]) }}"class="add-cart">Chi tiết sản phẩm</a>
                            <div class="border-top pt-2">
                                @if($product->discount > 0)
                                    <div class="discount text-danger font-weight-bold" style="text-decoration: line-through; font-size:13px">{{ number_format($product->price) }} VNĐ</div>
                                    <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->discount) }} VNĐ</div>
                                @else
                                    <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->price) }} VNĐ</div>
                                @endif
                            </div>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>XiaoMi mới nhất<br> <span>Iphone Hot nhất</span> <br>SamSung Hot</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="/temp/assets/img/product-sale.png" alt="">
                    <div class="hot__deal__sticker">
                        <span>Giảm giá</span>
                        <h5>9.000 đ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Ưu đãi trong tuần</span>
                    <h2>Đồng giá các loại phụ kiện</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item"><span>30</span> <p>Ngày</p></div>
                        <div class="cd-item"><span>02</span> <p>Giờ</p></div>
                        <div class="cd-item"><span>17</span> <p>Phút</p></div>
                        <div class="cd-item"><span>15</span> <p>Giây</p></div>
                    </div>
                    <a href="/shop" class="primary-btn">Khám phá cửa hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Tin tức mới</span>
                    <h2>Xu hướng điện thoại mới</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($post_hots as $item)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="/temp/images/post/{{$item->thumb}}" alt="{{ $item->Title }}"></div>
                        <div class="blog__item__text">
                            <span><img src="/temp/assets/img/icon/calendar.png" alt=""> {{$item->updated_at}}</span>
                            <h5>{{ $item->Title }}</h5>
                            <a href="{{ route('posts.details', ['slug' =>$item->slug]) }}">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
