@extends('layouts.shop_layout')
@section('loader')
    <div id="loader-wrapper">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    @endsection
@section('slider')
    <div class="content offset-top-0" id="slider">
        <!--
            #################################
            - THEMEPUNCH BANNER -
            #################################
            -->
        <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
        <h2 class="hidden">Slider Section</h2>
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE -sale events -->
                    @foreach($events as $event)
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                        <!-- MAIN IMAGE -->
                        {{--<img src="images/slides/slide-1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
                        <img src="{{asset('')}}{{$event->banner}}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                        <!-- LAYERS -->
                        <!-- TEXT -->
                        <div class="tp-caption lfl stb"
                             data-x="205"
                             data-y="center"
                             data-voffset="60"
                             data-speed="600"
                             data-start="900"
                             data-easing="Power4.easeOut"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 2;">
                            <div class="tp-caption1--wd-1">{{$event->title}}</div>
                            {{--<div class="tp-caption1--wd-2">{{$event->title}}</div>--}}
                            {{--<div class="tp-caption1--wd-3">new arrivals </div>--}}
                            <a href="{{asset('sale')}}/{{$event->slug}}" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
                        </div>
                    </li>
                    @endforeach

                    <!-- /SLIDE sale events -->
    <!-- SLIDE -products -->
@foreach($banners as $banner)

        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
            <!-- MAIN IMAGE -->
            {{--<img src="images/slides/slide-1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >--}}
            <img src="{{asset('')}}{{$banner->thumbnail}}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
            <!-- LAYERS -->
            <!-- TEXT -->
            <div class="tp-caption lfl stb"
                 data-x="205"
                 data-y="center"
                 data-voffset="60"
                 data-speed="600"
                 data-start="900"
                 data-easing="Power4.easeOut"
                 data-endeasing="Power4.easeIn"
                 style="z-index: 2;">
                <div class="tp-caption1--wd-1">{{$banner->category->name}}</div>
                <div class="tp-caption1--wd-2">{{$banner->name}}</div>
                @if($banner->is_sale == 1)
                    <div class="tp-caption1--wd-3"><span style="color: red">${{$banner->sale_price}}</span>&nbsp;<span style="text-decoration-line: line-through">${{$banner->price}}</span> </div>
                    @else
                    <div class="tp-caption1--wd-3">${{$banner->price}} </div>
                    @endif
                <a href="{{asset('product')}}/{{$banner->slug}}" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
            </div>
        </li>
    @endforeach
                    {{--/ slide products--}}
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- news & sale products -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <!-- title -->
                    <div class="title-with-button">
                        <div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                        <h2 class="text-left text-uppercase title-under pull-left">New</h2>
                    </div>
                    <!-- /title -->
                    <!-- carousel -->
                    <div class="carousel-products row" id="carouselNew">
                        @foreach($new_products as $product)
                        <div class="col-lg-3">
                            <!-- product -->
                            <div class="product">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <a href="{{asset('product')}}/{{$product->slug}}"> <img src="{{asset('')}}{{$product->thumbnail}}" height="300px" alt=""> </a>
                                        <!-- quick-view -->
                                        <a data-slug="{{$product->slug}}" class="quick-view quick_view_btn"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    <!-- label news -->
                                    {{--<div class="product__label product__label--right product__label--new"> <span>new</span> </div>--}}
                                    <!-- /label news -->
                                    <!-- product name -->
                                    <div class="product__inside__name">
                                        <h2><a href="{{asset('product')}}/{{$product->slug}}">{{$product->name}}</a></h2>
                                    </div>
                                    <!-- /product name -->
                                    <!-- product price -->
                                    @if($product->is_sale == 1)
                                        <div class="product__inside__price price-box">{{number_format($product->sale_price,'0',',','.')}}<span class="price-box__old">{{number_format($product->price,'0',',','.')}}</span></div>
                                        @else
                                        <div class="product__inside__price price-box">{{number_format($product->price,'0',',','.')}}</div>
                                        @endif
                                    <!-- /product price -->
                                    <div class="product__inside__hover">
                                        <!-- product rating -->
                                        <div class="rating">
                                            @foreach($product->stars as $star)
                                                <span class="fa fa-star"></span>
                                            @endforeach
                                            @if(($product->star * 2) % 2 == 0)
                                                    <span class="fa fa-star"></span>
                                                @else
                                                    <span class="fa fa-star-half"></span>
                                                @endif
                                            {{--<span class="icon-star empty-star"></span> --}}
                                        </div>
                                        <!-- /product rating -->
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                            @endforeach
                    </div>
                    <!-- /carousel -->
                </div>
                <!-- promo -->
                <div class="col-xl-4 visible-xl">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-left text-uppercase title-under pull-left">PROMOS</h2>
                    </div>
                    <!-- /title -->
                    <div class="text-center promos">

                        <div class="promos__image">
                            <a href="lookbook.html" class="link-img-hover">
                                <img src="images/custom/promos.jpg" class="img-responsive" alt="">
                                <span class="promos__label">-20%</span>
                            </a>
                        </div>
                        <h2><a href="lookbook.html">Mauris lacinia lectus</a></h2>
                        Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis.
                    </div>
                </div>
                <!-- /promo -->

                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="divider--lg visible-sm visible-xs"></div>
                    <!-- title -->
                    <div class="title-with-button">
                        <div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                        <h2 class="text-left text-uppercase title-under pull-left">On Sale</h2>
                    </div>
                    <!-- /title -->
                    <!-- carousel -->
                    <div class="carousel-products row" id="carouselSale">
                        @foreach($sale_products as $product)
                        <div class="col-lg-3">
                            <!-- product -->
                            <div class="product">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <a href="{{asset('product')}}/{{$product->slug}}"> <img src="{{asset('')}}{{$product->thumbnail}}" height="300px" alt=""> </a>
                                        <!-- quick-view -->
                                        <a data-slug="{{$product->slug}}" class="quick-view quick_view_btn"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    <!-- label news -->
                                {{--<div class="product__label product__label--right product__label--new"> <span>new</span> </div>--}}
                                <!-- /label news -->
                                    <!-- product name -->
                                    <div class="product__inside__name">
                                        <h2><a href="{{asset('product')}}/{{$product->slug}}">{{$product->name}}</a></h2>
                                    </div>
                                    <!-- /product name -->
                                    <!-- product price -->
                                    @if($product->is_sale == 1)
                                        <div class="product__inside__price price-box">{{number_format($product->sale_price,'0',',','.')}}<span class="price-box__old">{{number_format($product->price,'0',',','.')}}</span></div>
                                    @else
                                        <div class="product__inside__price price-box">{{number_format($product->price,'0',',','.')}}</div>
                                @endif
                                <!-- /product price -->
                                    <div class="product__inside__hover">
                                        <!-- product rating -->
                                        <div class="rating">
                                            @foreach($product->stars as $star)
                                                <span class="fa fa-star"></span>
                                            @endforeach
                                            @if(($product->star * 2) % 2 == 0)
                                                <span class="fa fa-star"></span>
                                            @else
                                                <span class="fa fa-star-half"></span>
                                            @endif
                                            {{--<span class="icon-star empty-star"></span> --}}
                                        </div>
                                        <!-- /product rating -->
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                            @endforeach
                    </div>
                    <!-- /carousel -->
                </div>
            </div>
        </div>
    </div>
    <!-- /news & sale products -->
    <!-- featured products -->
    <div class="content">
        @foreach($categories as $category)
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-8">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-center text-uppercase title-under">{{$category->name}}</h2>
                    </div>
                    <!-- /title -->
                    <div class="product-listing carousel-products-mobile row">
                        @foreach($category->products as $product)
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <!-- product -->
                            <div class="product product--zoom">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <!-- product image carousel -->
                                        <div class="product__inside__carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox" style="height: 300px">
                                                <div class="item active"> <a href="{{asset('product')}}/{{$product->slug}}"><img src="{{asset('')}}{{$product->thumbnail}}" alt="" ></a> </div>
                                                @foreach($product->images as $image)
                                                <div class="item"> <a href="{{asset('product')}}/{{$product->slug}}"><img src="{{asset('')}}{{$image}}" alt=""></a> </div>
                                                    @endforeach
                                            </div>
                                            <!-- Controls -->
                                            <a class="carousel-control next"></a> <a class="carousel-control prev"></a>
                                        </div>
                                        <!-- /product image carousel -->
                                        <!-- quick-view -->
                                        <a data-slug="{{$product->slug}}" class="quick-view quick_view_btn"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    <!-- label news -->
                                    {{--<div class="product__label product__label--right product__label--new"> <span>new</span> </div>--}}
                                    <!-- /label news -->
                                    <!-- label sale -->
                                    {{--<div class="product__label product__label--left product__label--sale"> <span>Sale<br>--}}
												{{---20%</span>--}}
                                    {{--</div>--}}
                                    <!-- /label sale -->
                                    <!-- product name -->
                                    <div class="product__inside__name">
                                        <h2><a href="{{asset('product')}}/{{$product->slug}}">{{$product->name}}</a></h2>
                                    </div>
                                    <!-- /product name -->
                                    <!-- product description -->
                                    <!-- visible only in row-view mode -->
                                    {{--<div class="product__inside__description row-mode-visible"> Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </div>--}}
                                    <!-- /product description -->
                                    <!-- product price -->
                                    @if($product->is_sale == 1)
                                        <div class="product__inside__price price-box">${{$product->sale_price}}<span class="price-box__old">${{$product->price}}</span></div>
                                        @else
                                        <div class="product__inside__price price-box">${{$product->price}}</div>
                                        @endif
                                    <!-- /product price -->
                                    <!-- product review -->
                                    <!-- visible only in row-view mode -->
                                    <div class="product__inside__review row-mode-visible">
                                        <div class="rating row-mode-visible">
                                            @foreach($product->stars as $star)
                                                <span class="fa fa-star"></span>
                                            @endforeach
                                            @if(($product->star * 2) % 2 == 0)
                                                <span class="fa fa-star"></span>
                                            @else
                                                <span class="fa fa-star-half"></span>
                                            @endif
                                        </div>
                                        <a href="#">{{$product->rates()->count()}} Review(s)</a>
                                    </div>
                                    <!-- /product review -->
                                    <div class="product__inside__hover">
                                        <!-- product rating -->
                                        <div class="rating row-mode-hide">
                                            @foreach($product->stars as $star)
                                                <span class="fa fa-star"></span>
                                            @endforeach
                                            @if(($product->star * 2) % 2 == 0)
                                                <span class="fa fa-star"></span>
                                            @else
                                                <span class="fa fa-star-half"></span>
                                            @endif
                                        </div>
                                        <!-- /product rating -->
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                            @endforeach
                    </div>
                </div>
                <!-- lookbook -->
                <div class="col-xl-4 visible-xl">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-left text-uppercase title-under pull-left">LOOKBOOK</h2>
                    </div>
                    <!-- /title -->

                    <a class="link-img-hover" href="lookbook.html"><img src="images/custom/lookbook.jpg" class="img-responsive" alt=""></a>

                </div>
                <!-- /lookbook -->
            </div>
        </div>
            @endforeach
    </div>
    <!-- /featured products -->
    <!-- recent-posts-carousel -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- title -->
                    <div class="title-with-button">
                        <div class="carousel-products__button pull-right">
                            <span class="btn-prev"></span>
                            <span class="btn-next"></span>
                        </div>
                        <h2 class="text-center text-uppercase title-under">News</h2>
                    </div>
                    <!-- /title -->
                    <!-- carousel-new -->
                    <div class="carousel-products row" id="postsCarousel">
                        @foreach($news as $new)
                        <!-- slide-->
                        <div class="col-sm-3 col-xl-6">
                            <!--  -->
                            <div class="recent-post-box">
                                <div class="col-lg-12 col-xl-6">
                                    <a href="{{asset('news/')}}{{$new->slug}}">
												<span class="figure" style="height: 300px">
													<img src="{{asset('')}}{{$new->thumbnail}}" alt="">
													<span class="figcaption label-top-left">
														<span>
															<b>{{$new->created}}</b>
															{{--<em>jun</em>--}}
														</span>
													</span>
												</span>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="recent-post-box__text">
                                        <h4><a href="{{asset('news/')}}{{$new->slug}}">{{$new->title}}</a></h4>
                                        <p>
                                            {{$new->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- / -->
                        </div>
                        <!-- /slide -->
                            @endforeach
                    </div>
                    <!-- /carousel-new -->
                </div>
            </div>
        </div>
    </div>
    <!-- /recent-posts-carousel -->
    <!-- brands-carousel -->
    {{--<div class="content section-indent-bottom">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="brands-carousel">--}}
                    {{--<div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>--}}
                    {{--<div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- /brands-carousel -->
@endsection
@section('modal')
    <!-- modalAddToCart -->
    <div class="modal  fade"  id="modalAddToCart" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog white-modal modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        "Mauris lacinia lectus" added to cart successfully!
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <a href="shopping-cart-right-column.html"  class="btn btn--ys btn--full btn--lg">go to cart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /modalAddToCart -->
    <!-- modalLoginForm-->
    <div class="modal  fade"  id="modalLoginForm" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog white-modal modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                    <h4 class="modal-title text-center text-uppercase">Login form</h4>
                </div>
                <form>
                    <div class="modal-body indent-bot-none">
                        <div class="form-group">
                            <div class="input-group">
						    <span class="input-group-addon">
						    	<span class="icon icon-person"></span>
						    </span>
                                <input type="text" id="LoginFormName" class="form-control" placeholder="Name:">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="password" id="LoginFormPass" class="form-control" placeholder="Password:">
                            </div>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="checkBox2">
                            <label for="checkBox2">
                                <span class="check"></span>
                                <span class="box"></span>
                                Remember me
                            </label>
                        </div>
                        <button type="button" class="btn btn--ys btn--full btn--lg">Login</button>
                        <div class="divider divider--xs"></div>
                        <button type="button" class="btn btn--ys btn--full btn--lg btn-blue"><span class="fa fa-facebook"></span> Login with Facebook</button>
                        <div class="divider divider--xs"></div>
                        <button type="button" class="btn btn--ys btn--full btn--lg btn-red"><span class="fa fa-google-plus"></span> Login with Google</button>
                        <div class="divider divider--xs"></div>
                        <ul class="list-arrow-right">
                            <li><a href="#">Forgot your username?</a></li>
                            <li><a href="#">Forgot your password?</a></li>
                            <li><a href="#">Create an account</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /modalLoginForm-->

    {{--<div class="modal  modal--bg fade"  id="newsletterModal" data-pause=2000>--}}
    {{--<div class="modal-dialog white-modal">--}}
    {{--<div class="modal-content modal-md">--}}
    {{--<div class="modal-bg-image bottom-right">--}}
    {{--<img  src="images/custom/newsletter-bg.png" alt="" class="img-responsive">--}}
    {{--</div>--}}
    {{--<div class="modal-block">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>--}}
    {{--</div>--}}
    {{--<div class="modal-newsletter text-center">--}}
    {{--<img class="logo img-responsive1 replace-2x" src="images/logo.png" alt=""/>--}}
    {{--<h2 class="text-uppercase modal-title">JOIN US NOW!</h2>--}}
    {{--<p class="color-dark">And get hot news about the theme</p>--}}
    {{--<p class="color font24 custom-font font-lighter">--}}
    {{--YOURStore--}}
    {{--</p>--}}
    {{--<form  method="post" name="mc-embedded-subscribe-form" target="_blank" class="subscribe-form">--}}
    {{--<div class="row-subscibe">--}}
    {{--<input  type="text" name="subscribe"   placeholder="Your E-mail">--}}
    {{--<button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>--}}
    {{--</div>--}}
    {{--<div class="checkbox-group form-group-top clearfix">--}}
    {{--<input type="checkbox" id="checkBox1">--}}
    {{--<label for="checkBox1">--}}
    {{--<span class="check"></span>--}}
    {{--<span class="box"></span>--}}
    {{--&nbsp;&nbsp;DON&#39;T SHOW THIS POPUP AGAIN--}}
    {{--</label>--}}
    {{--</div>--}}

    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- / Modal (newsletter) -->

    <!-- Modal (quickViewModal) -->
    <div class="modal  modal--bg fade"  id="quickViewModal">
        <div class="modal-dialog white-modal">
            <div class="modal-content container">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                </div>
                <!--  -->
                <div class="product-popup">
                    <div class="product-popup-content">
                        <div class="container-fluid">
                            <div class="row product-info-outer">
                                <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
                                    <div class="product-main-image">
                                        <div class="product-main-image__item"><img src='' id="product_thumbnail" alt="" /></div>
                                    </div>
                                </div>
                                <div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
                                    <div class="wrapper">
                                        <div class="product-info__sku pull-left">SKU: <strong id="product_code"></strong></div>
                                        <div class="product-info__availabilitu pull-right">Availability:   <strong class="color" id="product_status"></strong></div>
                                    </div>
                                    <div class="product-info__title">
                                        <h2 id="product_name"></h2>
                                    </div>
                                    <div class="price-box product-info__price"><span class="price-box__new" id="price_new"></span> <span class="price-box__old" id="price_old"></span></div>
                                    <div class="divider divider--xs product-info__divider"></div>
                                    <div class="product-info__description">
                                        <div class="product-info__description__brand"><span class="option-label">Brand:</span>&nbsp;<span id="product_brand"></span> </div>
                                    </div>
                                    <div class="divider divider--xs product-info__divider"></div>
                                    <div class="wrapper">
                                        <div class="pull-left"><span class="option-label">COLOR:</span> </div>
                                    </div>
                                    <ul  id="product_colors">
                                    </ul>
                                    <div class="wrapper">
                                        <div class="pull-left"><span class="option-label">SIZE:</span></div>
                                    </div>
                                    <ul class="options-swatch options-swatch--size options-swatch--lg" id="product_sizes">
                                    </ul>
                                    <div class="divider divider--sm"></div>
                                    <div class="wrapper">
                                        <div class="pull-left"><span class="qty-label">QTY:</span></div>
                                        <div class="pull-left"><input type="text" name="quantity" class="input--ys qty-input pull-left" value="1" id="qty_quickview"></div>
                                        <div class="pull-left"><button type="submit" class="btn btn--ys btn--xxl add_cart_btn" id="product_add_cart"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / -->
            </div>
        </div>
    </div>
    <!-- / Modal (quickViewModal) -->
    <!-- Modal (newsletter) -->

    {{--modal alert max quantity--}}
    <div class="modal fade" id="alert_qty">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                   This size just has <span id="max_qty"></span> products
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endsection
@section('script')
<script type="text/javascript" src="{{asset('js/shop/custom/index.js')}}"></script>
    @endsection
