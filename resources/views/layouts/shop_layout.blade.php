<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Xero shoes</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="YOURStore - Responsive HTML5 Template">
    <meta name="author" content="etheme.com">
    {{--<link rel="shortcut icon" href="{{asset('favicon.ico')}}">--}}
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External Plugins CSS -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('css/shop/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop/bootstrap-select.css')}}">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/shop/settings.css')}}" media="screen" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/shop/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop/nouislider.css')}}">
    <!-- Icon Fonts  -->
    <link rel="stylesheet" href="{{asset('css/shop/font/style.css')}}">
    <!-- Head Libs -->
    <style>
        a.color_selected{
            border: 3px solid #3e634b;
            margin: 2px;
        }
        a.size_selected{
            border: 3px solid #3e634b;
            margin: 2px;
        }
    </style>
	<!-- jQuery 1.10.1-->
	<script src="{{asset('js/shop/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript">
        //setup ajax
        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        );
        var domain =  '{{asset('')}}';
    </script>
    <!-- Modernizr -->
    <script src="{{asset('js/shop/modernizr.js')}}"></script>
</head>
<body class="index">
@yield('loader')
<!-- Back to top -->
<div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
<!-- /Back to top -->
<!-- mobile menu -->
<div class="hidden">
    <nav id="off-canvas-menu">
        <ul class="expander-list">
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="index.html"><span class="act-underline">LAYOUT</span></a>
						</span>
                <ul class="dropdown-menu megamenu image-links-layout" role="menu">
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-1.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 1 (Default)</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-02.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-2.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 2</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-03.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-3.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 3</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-04.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-4.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 4</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-05.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-5.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 5</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-06.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-6.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 6</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-07.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-7.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 7</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-08.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-8.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 8</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-09.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-9.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 9</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-10.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-10.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 10</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-11.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-11.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 11</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="index-12.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/layout-img-12.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
								<span class="figcaption">Home page - Layout 12</span>
								</a>
								</span>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="listing.html"><span class="act-underline">LISTING</span></a>
						</span>
                <ul class="dropdown-menu megamenu image-links" role="menu">
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-1.png" alt=""/></span>
								<span class="figcaption text-uppercase">left column</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-left-right-col.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-2.png" alt=""/></span>
								<span class="figcaption text-uppercase">left, right column</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-col-right_03.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-3.png" alt=""/></span>
								<span class="figcaption text-uppercase">right column</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-without-col-04.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-4.png" alt=""/></span>
								<span class="figcaption text-uppercase">without columns</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-col-left-without-without-static-block_05.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-5.png" alt=""/></span>
								<span class="figcaption text-uppercase">left column,<br> without Static block</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-without-col-without-static-block_06.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-6.png" alt=""/></span>
								<span class="figcaption text-uppercase">without columns,<br> without Static block</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-without-col-without-static-block_small_07.html">
								<span class="figure"><img class="img-responsive" src="images/custom/listing-img-7.png" alt=""/></span>
								<span class="figcaption text-uppercase">Small</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fourth">
								<span class="image-link">
								<a href="listing-without-col-without-static-block_big_08.html">
								<span class="figure"><img class="img-responsive img-border" src="images/custom/listing-img-8.png" alt=""/></span>
								<span class="figcaption text-uppercase">Big</span>
								</a>
								</span>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="product.html"><span class="act-underline"><span class="act-underline">PRODUCT</span></span></a>
						</span>
                <ul class="dropdown-menu megamenu image-links" role="menu">
                    <li class="col-one-third">
								<span class="image-link">
								<a href="product-small.html">
								<span class="figure"><img class="img-responsive" src="images/custom/product-menu-img-1.png" alt=""/></span>
								<span class="figcaption text-uppercase">image size  - small</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-third">
								<span class="image-link">
								<a href="product.html">
								<span class="figure"><img class="img-responsive" src="images/custom/product-menu-img-2.png" alt=""/></span>
								<span class="figcaption text-uppercase">image size  - medium</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-third">
								<span class="image-link">
								<a href="product-big.html">
								<span class="figure"><img class="img-responsive" src="images/custom/product-menu-img-3.png" alt=""/></span>
								<span class="figcaption text-uppercase">image size  - big</span>
								</a>
								</span>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="blog-layout-1.html"><span class="act-underline">BLOG</span></a>
						</span>
                <ul class="dropdown-menu megamenu image-links" role="menu">
                    <li class="col-one-third">
								<span class="image-link">
								<a href="blog-layout-1.html">
								<span class="figure"><img class="img-responsive" src="images/custom/blog-menu-img-1.png" alt=""/></span>
								<span class="figcaption text-uppercase">blog - Layout 1</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-third">
								<span class="image-link">
								<a href="blog-layout-2.html">
								<span class="figure"><img class="img-responsive" src="images/custom/blog-menu-img-2.png" alt=""/></span>
								<span class="figcaption text-uppercase">blog - Layout 2</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-third">
								<span class="image-link">
								<a href="blog-layout-3.html">
								<span class="figure"><img class="img-responsive" src="images/custom/blog-menu-img-3.png" alt=""/></span>
								<span class="figcaption text-uppercase">blog - Layout 3</span>
								</a>
								</span>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="gallery-layout-1.html"><span class="act-underline">GALLERY</span></a>
						</span>
                <ul class="dropdown-menu megamenu image-links" role="menu">
                    <li class="col-one-fifth">
								<span class="image-link">
								<a href="gallery-layout-1.html">
								<span class="figure"><img class="img-responsive" src="images/custom/gallery-menu-img-1.png" alt=""/></span>
								<span class="figcaption text-uppercase">Gallery - Layout 1</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fifth">
								<span class="image-link">
								<a href="gallery-layout-2.html">
								<span class="figure"><img class="img-responsive" src="images/custom/gallery-menu-img-2.png" alt=""/></span>
								<span class="figcaption text-uppercase">Gallery - Layout 2</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fifth">
								<span class="image-link">
								<a href="gallery-layout-3.html">
								<span class="figure"><img class="img-responsive" src="images/custom/gallery-menu-img-3.png" alt=""/></span>
								<span class="figcaption text-uppercase">Gallery - Layout 3</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fifth">
								<span class="image-link">
								<a href="gallery-layout-4.html">
								<span class="figure"><img class="img-responsive" src="images/custom/gallery-menu-img-4.png" alt=""/></span>
								<span class="figcaption text-uppercase">Gallery - Layout 4</span>
								</a>
								</span>
                    </li>
                    <li class="col-one-fifth">
								<span class="image-link">
								<a href="gallery-layout-5.html">
								<span class="figure"><img class="img-responsive" src="images/custom/gallery-menu-img-5.png" alt=""/></span>
								<span class="figcaption text-uppercase">Gallery - Layout 5</span>
								</a>
								</span>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name"><span class="expander">-</span>
							<a href="about.html"><span class="act-underline">PAGES</span></a>
						</span>
                <ul class="multicolumn">
                    <li><a href="about.html">About</a></li>
                    <li><a href="support-24.html">Support 24/7 page</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="under-construction.html">Under Construction</a></li>
                    <li><a href="warranty.html">Warranty Page</a></li>
                    <li><a href="site-map.html">Site Map</a></li>
                    <li><a href="delivery-page.html">Delivery Page</a></li>
                    <li><a href="payment-page.html">Payment page</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="page-404.html">Page 404</a></li>
                    <li><a href="_newsletter-template/newsletter-template.html">Newsletter template</a></li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="listing.html"><span class="act-underline">WOMEN’s<span class="badge badge--menu">NEW</span></span></a>
						</span>
                <ul class="multicolumn-level">
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>TOPS</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Blouses & Shirts</a></li>
                            <li class="level3">
										<span class="name">
											<span class="expander">-</span>
											<a href="listing.html"><span class="act-underline">Dresses</span></a>
										</span>
                                <ul class="image-links-level-4 megamenu__submenu">
                                    <li class="level4"><a href="listing.html">Bodycon Dresses</a></li>
                                    <li class="level4">
												<span class="name">
													<span class="expander">-</span>
													<a href="listing.html"><span class="act-underline">Midi Dresses</span></a>
												</span>
                                        <ul class="image-links-level-5 megamenu__submenu">
                                            <li class="level5"><a href="listing.html">Occasion & Cocktail</a></li>
                                            <li class="level5"><a href="listing.html">Casual Everyday</a></li>
                                            <li class="level5"><a href="listing.html">Going Out & Party Dresses</a></li>
                                        </ul>
                                    </li>
                                    <li class="level4"><a href="listing.html">Fit & Flare</a></li>
                                    <li class="level4"><a href="listing.html">Shift Dresses</a></li>
                                    <li class="level4"><a href="listing.html">Slip Dresses</a></li>
                                    <li class="level4"><a href="listing.html">Tunic Dresses</a></li>
                                </ul>
                            </li>
                            <li class="level3"><a href="listing.html">Tops & T-shirts</a></li>
                            <li class="level3"><a href="listing.html">Sleeveless Tops</a></li>
                            <li class="level3"><a href="listing.html">Sweaters & Cardigans</a></li>
                            <li class="level3"><a href="listing.html">Jackets</a></li>
                            <li class="level3"><a href="listing.html">Outerwear</a></li>
                        </ul>
                    </li>
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>BOTTOMS</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Trousers</a></li>
                            <li class="level3"><a href="listing.html">Jeans</a></li>
                            <li class="level3"><a href="listing.html">Leggings</a></li>
                            <li class="level3"><a href="listing.html">Jumpsuit & shorts</a></li>
                            <li class="level3"><a href="listing.html">Skirts</a></li>
                            <li class="level3"><a href="listing.html">Tights</a></li>
                        </ul>
                    </li>
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>ACCESSORIES</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Jewellery</a></li>
                            <li class="level3"><a href="listing.html">Hats</a></li>
                            <li class="level3"><a href="listing.html">Scarves & snoods</a></li>
                            <li class="level3"><a href="listing.html">Belts</a></li>
                            <li class="level3"><a href="listing.html">Bags</a></li>
                            <li class="level3"><a href="listing.html">Shoes</a></li>
                            <li class="level3"><a href="listing.html">Sunglasses</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
						<span class="name">
							<span class="expander">-</span>
							<a href="listing.html"><span class="act-underline">MEN’s<span class="badge badge--menu badge--color">SALE</span></span></a>
						</span>
                <ul class="multicolumn-level">
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>TOPS</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Jackets</a></li>
                            <li class="level3"><a href="listing.html">Shirts</a></li>
                            <li class="level3"><a href="listing.html">Sweaters & Cardigans</a></li>
                            <li class="level3"><a href="listing.html">T-shirts</a></li>
                        </ul>
                    </li>
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>BOTTOMS</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Trousers</a></li>
                            <li class="level3"><a href="listing.html">Jeans</a></li>
                            <li class="level3"><a href="listing.html">Skirts</a></li>
                            <li class="level3"><a href="listing.html">Swimwear</a></li>
                        </ul>
                    </li>
                    <li>
								<span class="name">
									<span class="expander">-</span>
									<a class="megamenu__subtitle" href="listing.html">
										<span>ACCESSORIES</span>
									</a>
								</span>
                        <ul class="image-links-level-3 megamenu__submenu">
                            <li class="level3"><a href="listing.html">Bags</a></li>
                            <li class="level3"><a href="listing.html">Shoes</a></li>
                            <li class="level3"><a href="listing.html">Sunglasses</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<!-- /mobile menu -->
<!-- HEADER section -->
<div class="header-wrapper">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-6 col-xl-7">
                    <!-- logo start -->
                    <a href="{{asset('/')}}"><img class="logo  img-responsive" src="{{asset('images/xero-logo-2x.png')}}" alt=""/></a>
                    <!-- logo end -->
                </div>
                {{--<div class="col-sm-8 col-md-8 col-lg-6 col-xl-5 text-right">--}}
                    {{--<!-- slogan start -->--}}
                    {{--@guest--}}
                        {{--<a href="{{asset('/login')}}">Login</a>--}}
                        {{--@else--}}
                        {{--<div class="slogan"> Welcome : {{Auth::user()->name}} </div>--}}
                        {{--<div class="settings">--}}

                            {{--<!-- language start -->--}}
                            {{--<div class=" dropdown text-right">--}}
                                {{--<div class="dropdown-label hidden-sm hidden-xs">Welcome:</div>--}}
                                {{--<a class="dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->name}}<span class="caret"></span></a>--}}
                                {{--<ul class="dropdown-menu dropdown-menu--xs-full">--}}
                                    {{--<li><a href="#">My account</a></li>--}}
                                    {{--@if(Auth::user()->isadmin == 1 or Auth::user()->isadmin == 2)--}}
                                    {{--<li><a href="{{asset('/admin')}}">Admin site</a></li>--}}
                                    {{--@endif--}}
                                    {{--<li><a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();--}}
          {{--document.getElementById('logout-form').submit();">Sign out</a>--}}
                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--@csrf--}}
                                        {{--</form></li>--}}
                                    {{--<li><a href="#">Spanish</a></li>--}}
                                    {{--<li><a href="#">Russian</a></li>--}}
                                    {{--<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<!-- language end -->--}}
                        {{--</div>--}}
                        {{--@endguest--}}
                    {{--<!-- slogan end -->--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="stuck-nav">
            <div class="container offset-top-5">
                <div class="row">
                    <div class="pull-left col-sm-9 col-md-9 col-lg-10">
                        <!-- navigation start -->
                        <nav class="navbar">
                            <div class="responsive-menu mainMenu">
                                <!-- Mobile menu Button-->
                                <div class="col-xs-2 visible-mobile-menu-on">
                                    <div class="expand-nav compact-hidden">
                                        <a href="#off-canvas-menu" class="off-canvas-menu-toggle">
                                            <div class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="menu-text">MENU</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- //end Mobile menu Button -->
                                <ul class="nav navbar-nav">
                                    <li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>
                                    <li ><a href="{{asset('type/men')}}"><span class="act-underline">Men</span></a></li>
                                    <li ><a href="{{asset('type/women')}}"><span class="act-underline">Women</span></a></li>
                                    <li ><a href="{{asset('type/unisex')}}"><span class="act-underline">Unisex</span></a></li>
                                    <li ><a href="{{asset('type/kid')}}"><span class="act-underline">Kid</span></a></li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Category</span></a>
                                        <ul class="dropdown-menu megamenu image-links-layout" role="menu">
                                            @foreach($categorys as $category)
                                            <li class="col-one-fourth">
														<span class="image-link">
														<a href="{{asset('category')}}/{{$category->slug}}">
														<span class="figure"><img class="img-responsive img-border" src="{{asset('')}}{{$category->thumbnail}}" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>
														<span class="figcaption">{{$category->name}}</span>
														</a>
														</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a href="{{asset('gallery')}}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Gallery</span></a>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a href="{{asset('news')}}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">News</span></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- navigation end -->
                    <div class="pull-right col-sm-3 col-md-3 col-lg-2">
                        <div class="text-right">
                            <!-- search start -->
                            <div class="search link-inline" style="width: 100%">
                                <a href="#" class="search__open"><span class="icon icon-search"></span></a>
                                <div class="search-dropdown">
                                        <div class="input-outer">
                                            <input type="search" name="search" value="" maxlength="128" placeholder="SEARCH:" class="search-field" style="width: 100%">

                                        </div>
                                    <div class="clearfix"></div>
                                        <a class="search__close"><span class="icon icon-close"></span></a>
                                    <div style="background-color: #c4ffe1">
                                        <ul  id="search_result" style="width: 100%; display: none; list-style-type: none; text-align: center">

                                        </ul>
                                        <p class="show_result" style="display: none"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- search end -->
                            <!-- account menu start -->
                            <div class="account link-inline">
                                <div class="dropdown text-right">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="icon icon-person "></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu--xs-full">
                                       @guest
											<li><a href="{{asset('checkout')}}"><span class="icon icon-done_all"></span>Checkout</a></li>
											<li><a href="{{asset('login')}}"><span class="icon icon-lock"></span>Log In</a></li>
											<li><a href="{{asset('register')}}"><span class="icon icon-person_add"></span>Create an account</a></li>
											<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
										   @else
											<li><a href="{{asset('profile/')}}{{Auth::user()->slug}}"><span class="icon icon-person"></span>{{Auth::user()->name}}</a></li>
											<li><a href="{{asset('checkout')}}"><span class="icon icon-done_all"></span>Checkout</a></li>
										@if(Auth::user()->isadmin == 1 or Auth::user()->isadmin == 2)
											<li><a href="{{asset('admin')}}"><span class="icon icon-lock"></span>Admin site</a></li>
											@endif
											<li><a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Sign out</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form></li>
											<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
										@endguest
                                    </ul>
                                </div>
                            </div>
                            <!-- account menu end -->
                            <!-- shopping cart start -->
                            <div class="cart link-inline">
                                <div class="dropdown text-right">
                                    <a href="{{asset('cart')}}">
                                        <span class="icon icon-shopping_basket"></span>
                                        <span class="badge badge--cart" id="cart_count">{{Cart::content()->count()}}</span>
                                    </a>
                                </div>
                            </div>
                            <!-- shopping cart end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- End HEADER section -->
<!-- Slider section -->
@yield('slider')
<!-- END REVOLUTION SLIDER -->
<!-- CONTENT section -->
<div id="pageContent">
@yield('content')
</div>
<!-- End CONTENT section -->
<!-- FOOTER section -->
<footer>
    <!-- footer-data -->
    <div class="container inset-bottom-60">
        <div class="row" >
            <div class="col-sm-12 col-md-5 col-lg-6 border-sep-right">
                <div class="footer-logo hidden-xs">
                    <!--  Logo  -->
                    <a class="logo" href="{{asset('/')}}"> <img class="" src="{{asset('images/xero-logo-2x.png')}}"  alt="YOURStore"> </a>
                    <!-- /Logo -->
                </div>
                <div class="box-about">
                    <div class="mobile-collapse">
                        <h4 class="mobile-collapse__title visible-xs">ABOUT US</h4>
                        <div class="mobile-collapse__content">
                            <p> No more need to look for other ecommerce themes. We provide huge number of different layouts. Yourstore comes packed with free and useful features developed to make your website creation easier. Innovative clean design, advanced functionality, UI made for humans, extensive documenta- tion and support i continue this list infinitely... </p>
                        </div>
                    </div>
                </div>
                <!-- subscribe-box -->
                <div class="subscribe-box offset-top-20">
                    <div class="mobile-collapse">
                        <h4 class="mobile-collapse__title">NEWSLETTER SIGNUP</h4>
                        <div class="mobile-collapse__content">
                            <form class="form-inline">
                                <input class="subscribe-form__input" type="text" name="subscribe">
                                <button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /subscribe-box -->
            </div>
            <div class="col-sm-12 col-md-7 col-lg-6 border-sep-left">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mobile-collapse">
                            <h4 class="text-left  title-under  mobile-collapse__title">INFORMATION</h4>
                            <div class="v-links-list mobile-collapse__content">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="support-24.html">Customer Service</a></li>
                                    <li><a href="faq.html">Privacy Policy</a></li>
                                    <li><a href="site-map.html">Site Map</a></li>
                                    <li><a href="typography.html">Search Terms</a></li>
                                    <li><a href="warranty.html">Advanced Search</a></li>
                                    <li><a href="delivery-page.html">Orders and Returns</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mobile-collapse">
                            <h4 class="text-left  title-under  mobile-collapse__title">WHY BUY FROM US</h4>
                            <div class="v-links-list mobile-collapse__content">
                                <ul>
                                    <li><a href="warranty.html">Shipping &amp; Returns</a></li>
                                    <li><a href="typography.html">Secure Shopping</a></li>
                                    <li><a href="about.html">International Shipping</a></li>
                                    <li><a href="delivery-page.html">Affiliates</a></li>
                                    <li><a href="support-24.html">Group Sales</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /footer-data -->
    <div class="divider divider-md visible-xs visible-sm visible-md"></div>
    <!-- social-icon -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="social-links social-links--large">
                    <ul>
                        <li><a class="icon fa fa-facebook" href="http://www.facebook.com/"></a></li>
                        <li><a class="icon fa fa-twitter" href="http://www.twitter.com/"></a></li>
                        <li><a class="icon fa fa-google-plus" href="http://www.google.com/"></a></li>
                        <li><a class="icon fa fa-instagram" href="https://instagram.com/"></a></li>
                        <li><a class="icon fa fa-youtube-square" href="https://www.youtube.com/"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /social-icon -->
    <!-- footer-copyright -->
    <div class="container footer-copyright">
        <div class="row">
            <div class="col-lg-12"> <a href="index.html"><span>Your</span>Store</a> &copy; 2016 . All Rights Reserved. </div>
        </div>
    </div>
    <!-- /footer-copyright -->
    <a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a>
</footer>
<!-- END FOOTER section -->
<div id="productQuickView" class="white-popup mfp-hide">
    <h1>Modal dialog</h1>
    <p>You won't be able to dismiss this by usual means (escape or
        click button), but you can close it programatically based on
        user choices or actions.
    </p>
</div>
{{--<div id="compareSlide" class="hidden-xs">--}}
    {{--<div class="container">--}}
        {{--<div class="compareSlide__top">--}}
            {{--Compare--}}
        {{--</div>--}}
        {{--<a class="compareSlide__close icon icon-close">--}}
        {{--</a>--}}
        {{--<div class="compared-product-row">--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
            {{--<div class="compared-product">--}}
                {{--<a href="#" class="compared-product__delete icon icon-delete"></a>--}}
                {{--<div class="compared-product__image"><a href="#"><img src="images/product/product-1.jpg" alt=""/></a></div>--}}
                {{--<a href="#" class="compared-product__name">Quis nostrud exercitation ullamco labori.</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="compareSlide__bot">--}}
            {{--<a href="#" class="clear-all icon icon-delete"><span>Clear All</span></a>--}}
            {{--<a href="#" class="btn btn--ys btn-compare"><span class="icon icon-shopping_basket"></span> Compare</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Button trigger modal -->


<!--================== modal ==================-->
@yield('modal')
<!--================== /modal ==================-->



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Bootstrap 3-->
<script src="{{asset('js/shop/bootstrap.min.js')}}"></script>
<!-- Specific Page External Plugins -->
<script src="{{asset('js/shop/slick.min.js')}}"></script>
<script src="{{asset('js/shop/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/shop/jquery.plugin.min.js')}}"></script>
<script src="{{asset('js/shop/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/shop/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/shop/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/shop/nouislider.min.js')}}"></script>
<script src="{{asset('js/shop/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/shop/jquery.elevatezoom.js')}}"></script><script src="{{asset('js/shop/jquery.colorbox-min.js')}}"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('js/shop/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/shop/jquery.themepunch.revolution.min.js')}}"></script>
<!-- Custom -->
<script src="{{asset('js/shop/custom.js')}}"></script>
<script src="{{asset('js/shop/js-index-01.js')}}"></script>
<script src="{{asset('js/shop/js-product.js')}}"></script>

<script type="text/javascript">

    //    search
    $j(document).on('keyup','.search-field', function(e){
        if (e.keyCode == 27) {
            $j('.search-field').val('');
            $j('#search_result').css('display', 'none');
            $j('.show_result').css('display', 'none');
        }
        else {
            var search = $j('input.search-field').val().trim();
            if(search === ""){
                $j('#search_result').css('display', 'none');
                $j('.show_result').css('display', 'none');
            }
            else {
                $j.ajax({
                    type: 'get',
                    url: domain +'search',
                    data:{
                        search: search
                    },
                    success: function (response) {
                        if (response.html !== ''){
                            $j('#search_result').html(response.html).css('display', 'block');
                            $j('.show_result').replaceWith('<a class="show_result btn pull-left" href="'+ domain +'search/'+ search +'" style="color: #ff3d72 ">See all results</a>');
                        }
                        else {
                            $j('#search_result').html(response.html);
                            $j('.show_result').replaceWith("<span class='show_result pull-left' style='color: #ff3d72 '>Don't have any content like this</span>");
                        }

                    }
                })
            }
        }
    });

    $j(document).on('click','.search__close',function () {
        $j('.search-field').val('');
        $j('#search_result').css('display', 'none');
        $j('.show_result').css('display', 'none');
    });



</script>

@yield('script')
</body>
</html>