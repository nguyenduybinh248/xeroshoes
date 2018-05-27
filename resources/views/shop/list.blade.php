@extends('layouts.shop_layout')
@section('content')



    <div class="container">
        <!-- two columns -->
        <div class="row">
            <!-- left column -->
            <aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
                <a href="#" class="slide-column-close visible-sm visible-xs"><span class="icon icon-chevron_left"></span>back</a>
                <div class="filters-block visible-xs">
                    <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
                </div>
                <!-- category block -->
                <div class="collapse-block ">
                    <h4 class="collapse-block__title ">Category</h4>
                    <div class="collapse-block__content">
                        <ul class="simple-list">
                            @foreach($categorys as $category)
                            <li><input type="radio" name="categories" class="categories to_search" value="{{$category->id}}">{{$category->name}} </li>
                                @endforeach
                            <li><button id="reset_category" data-class="categories" class="reset_btn btn btn--ys btn--md to_search">reset</button></li>
                                <input type="hidden" id="hidden_categories">
                        </ul>
                    </div>
                </div>
                <!-- /category block -->
                <!-- price slider block -->
                <div class="collapse-block">
                    <h4 class="collapse-block__title">PRICE</h4>
                    <div class="collapse-block__content">
                            <div class="price-input">
                                <label>From:</label>
                                <input type="number" id="price_min" class="prices" />
                            </div>
                            <div class="price-input-divider">-</div>
                            <div class="price-input">
                                <label>To:</label>
                                <input type="number" id="price_max" class="prices" />
                            </div>
                            <div class="price-input">
                                <input type="hidden" id="hidden_prices">
                                <button id="reset_price" class="btn btn--ys btn--md to_search ">reset</button>
                                <button class="btn btn--ys btn--md to_search">Filter</button>
                            </div>
                    </div>
                </div>
                <!-- /price slider block -->
                <!-- size block -->
                <div class="collapse-block">
                    <h4 class="collapse-block__title">SIZE</h4>
                    <div class="collapse-block__content">
                        <ul class="simple-list">
                            @foreach($sizes as $size)
                                <li><input type="radio" name="sizes" class="sizes to_search" value="{{$size->id}}">{{$size->size}} </li>
                                @endforeach
                                <li><button id="reset_size" data-class="sizes" class="reset_btn to_search btn btn--ys btn--md">reset</button></li>
                            <input type="hidden" id="hidden_sizes">
                        </ul>
                    </div>
                </div>
                <!-- /size block -->
                <!-- color block -->
                <div class="collapse-block">
                    <h4 class="collapse-block__title">COLOR</h4>
                    <div class="collapse-block__content">
                        <ul class="simple-list">
                            @foreach($colors as $color)
                            <li><input type="radio" name="colors" class="colors to_search" value="{{$color->id}}">{{$color->color}} </li>
                                @endforeach
                                <li><button id="reset_color" data-class="colors" class="reset_btn to_search btn btn--ys btn--md">reset</button></li>
                                <input type="hidden" id="hidden_colors">
                        </ul>
                    </div>
                </div>
                <!-- /color block -->
                <!-- brands block -->
                <div class="collapse-block">
                    <h4 class="collapse-block__title">BRANDS</h4>
                    <div class="collapse-block__content">
                        <ul class="simple-list">
                            @foreach($brands as $brands)
                                <li><input type="radio" name="brands" class="brands to_search" value="{{$brands->id}}">{{$brands->name}} </li>
                            @endforeach
                            <li><button id="reset_brand" data-class="brands" class="reset_btn to_search btn btn--ys btn--md">reset</button></li>
                                <input type="hidden" id="hidden_brands">
                        </ul>
                    </div>
                </div>
                <!-- /brands block -->
                <!-- gender block -->
                <div class="collapse-block">
                    <h4 class="collapse-block__title">Type</h4>
                    <div class="collapse-block__content">
                        <ul class="simple-list">
                            <li><input type="radio" name="types" class="types to_search" value="1">Men</li>
                            <li><input type="radio" name="types" class="types to_search" value="4">Women</li>
                            <li><input type="radio" name="types" class="types to_search" value="2">Unisex</li>
                            <li><input type="radio" name="types" class="types to_search" value="3">Kid</li>
                            <li><button id="reset_type" data-class="types" class="reset_btn to_search btn btn--ys btn--md">reset</button></li>
                            <input type="hidden" id="hidden_types">
                        </ul>
                    </div>
                </div>
                <!-- /gender block -->
            </aside>
            <!-- /left column -->
            <!-- center column -->
            <aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
                <!-- filters row -->
                <div class="filters-row">
                    <div class="pull-left">
                        <div class="filters-row__mode">
                            <a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a>
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a>
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="filters-row__items hidden-sm hidden-xs">{{$products->count()}} Item(s)</div>
                        <div class="filters-row__pagination">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                <!-- /filters row -->
                <div class="product-listing row">
                    @foreach($products as $product)
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
                        <!-- product -->
                        <div class="product product--zoom">
                            <div class="product__inside">
                                <!-- product image -->
                                <div class="product__inside__image">
                                    <!-- product image carousel -->
                                    <div class="product__inside__carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox"  style="height: 300px">
                                            <div class="item active"> <a href="{{asset('')}}{{$product->slug}}"><img src="{{asset('')}}{{$product->thumbnail}}" alt=""></a> </div>
                                            @foreach($product->images as $image)
                                            <div class="item"> <a href="{{asset('')}}{{$product->slug}}"><img src="{{asset('')}}{{$image}}" alt=""></a> </div>
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
                                <!-- product name -->
                                <div class="product__inside__name">
                                    <h2><a href="{{asset('')}}{{$product->slug}}">{{$product->name}}</a></h2>
                                </div>
                                <!-- /product name -->
                                <!-- product description -->
                                <!-- visible only in row-view mode -->
                                <div class="product__inside__description row-mode-visible"></div>
                                <!-- /product description -->
                                <!-- product price -->
                                <div class="product__inside__price price-box">{{$product->new_price}}<span class="price-box__old">{{$product->old_price}}</span></div>
                                <!-- /product price -->
                                <!-- product review -->
                                <!-- visible only in row-view mode -->
                                <div class="product__inside__review row-mode-visible">
                                </div>
                                <!-- /product review -->
                                <div class="product__inside__hover">
                                    <!-- product info -->
                                    <div class="product__inside__info">
                                        <div class="product__inside__info__btns">
                                            <a data-slug="{{$product->slug}}" class="quick-view quick_view_btn"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                                        </div>
                                    </div>
                                    <!-- /product info -->
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
                <!-- filters row -->
                <div class="filters-row">
                    <div class="pull-left">
                        <div class="filters-row__mode">
                            <a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a>
                            <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a>
                            <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="filters-row__items hidden-sm hidden-xs">{{$products->count()}} Item(s)</div>
                        <div class="filters-row__pagination">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                <!-- /filters row -->
            </aside>
            <!-- center column -->
        </div>
        <!-- /two columns -->
    </div>


    @endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/shop/custom/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/shop/custom/listing.js')}}"></script>
    @endsection

@section('modal')
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