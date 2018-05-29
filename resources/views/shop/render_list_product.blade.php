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
            <div class="filters-row__pagination ajax_paginate">
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
                                    <div class="item active"> <a href="{{asset('product')}}/{{$product->slug}}"><img src="{{asset('')}}{{$product->thumbnail}}" alt=""></a> </div>
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
                        <!-- product name -->
                        <div class="product__inside__name">
                            <h2><a href="{{asset('product')}}/{{$product->slug}}">{{$product->name}}</a></h2>
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
            <div class="filters-row__pagination ajax_paginate">
                {{$products->links()}}
            </div>
        </div>
    </div>
    <!-- /filters row -->
</aside>