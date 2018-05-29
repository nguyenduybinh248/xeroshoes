@extends('layouts.shop_layout')
@section('content')


    <section class="content offset-top-0">
        <div class="container">
            <div class="row product-info-outer">
                <div id="productPrevNext" class="hidden-xs hidden-sm">
                    <a href="#" class="product-prev"><img src="images/product/product-2.jpg" alt="" /></a>
                    <a href="#" class="product-next"><img src="images/product/product-3.jpg" alt="" /></a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 hidden-xs">
                            <div class="product-main-image">
                                <div class="product-main-image__item"><img src="{{asset('')}}{{$product->thumbnail}}" alt="" /></div>
                            </div>
                            <div class="product-images-carousel" id="color_images">
                                <ul id="smallGallery">
                                    @foreach($product->images as $image)
                                    <li><a><img src="{{asset('')}}{{$image}}" alt="" /></a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <div class="product-info col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="wrapper hidden-xs">
                                <div class="product-info__sku pull-left color-dark">SKU: <strong class="text-color">{{$product->product_code}}</strong></div>
                                <div class="product-info__availability pull-right color-dark">Availability:   <strong class="color">In Stock</strong> &nbsp; <strong class="color-red">
                                        @if($product->status == 1)
                                            Available
                                            @else
                                            Unavailable
                                        @endif
                                    </strong></div>
                            </div>
                            <div class="product-info__title">
                                <h2>{{$product->name}}</h2>
                            </div>
                            <div class="wrapper visible-xs">
                                <div class="product-info__sku pull-left">SKU: <strong>{{$product->product_code}}</strong></div>
                                <div class="product-info__availability pull-right">Availability:   <strong class="color">
                                        @if($product->status == 1)
                                            Available
                                        @else
                                            Unavailable
                                        @endif
                                    </strong></div>
                            </div>
                            <div class="visible-xs">
                                <div class="clearfix"></div>
                                <ul id="mobileGallery">
                                    @foreach($product->images as $image)
                                        <li><img src="{{asset('')}}{{$image}}" alt="" /></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="price-box product-info__price"><span class="price-box__new">{{$product->new_price}}</span> <span class="price-box__old">{{$product->old_price}}</span></div>
                            <div class="product-info__review">
                                <div class="rating">
                                    @foreach($product->stars as $star)
                                        <span class="fa fa-star"></span>
                                    @endforeach
                                    @if($product->star == 0)
                                        @else
                                            @if(($product->star * 2) % 2 == 0)
                                                <span class="fa fa-star"></span>
                                            @else
                                                <span class="fa fa-star-half"></span>
                                            @endif
                                    @endif
                                </div>
                                <a>{{$product->rates()->count()}} Review(s)</a>
                            </div>
                            <div class="divider divider--xs product-info__divider hidden-xs"></div>
                            <div class="product-info__description hidden-xs">
                                <div class="product-info__description__text">Brand :   {{$product->brand->name}}</div>
                            </div>
                            <div class="divider divider--xs product-info__divider"></div>
                            <div class="wrapper">
                                <div class="pull-left"><span class="option-label">COLOR:</span></div>
                            </div>
                            <ul  id="product_colors">
                                @foreach($product->color as $color)
                                    <li style="list-style-type: none; display: inline-block"><a class="color_of_product" data-color="{{$color->product_color}}">{{$color->color}}</a></li>&nbsp;
                                @endforeach
                            </ul>
                            <p id="color_error" style="display: none; color: crimson"></p>
                            <div class="wrapper">
                                <div class="pull-left"><span class="option-label">SIZE:</span></div>
                            </div>
                            <ul class="options-swatch options-swatch--size options-swatch--lg" id="product_sizes">

                            </ul>
                            <p id="size_error" style="display: none;color: crimson"></p>
                            <div class="divider divider--sm"></div>
                            <div class="wrapper">
                                <div class="pull-left"><span class="option-label text-uppercase">Type :</span></div>
                                @if($product->type == 0)
                                    Women
                                    @elseif($product->type == 0)
                                    Men
                                    @elseif($product->type == 0)
                                    Unisex
                                    @else
                                    Kid
                                @endif
                            </div>


                            <div class="divider divider--sm"></div>
                            <div class="wrapper">
                                <div class="pull-left"><span class="qty-label">QTY:</span></div>
                                <div class="pull-left"><input type="text" name="quantity" class="input--ys qty-input pull-left" id="qty_quickview"></div>
                                <p id="qty_error" style="display: none; color: crimson"></p>
                                <div class="pull-left"><button type="submit" class="btn btn--ys btn--xxl" id="product_add_cart"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs--ys" role="tablist">
                            <li class="active"><a href="#Tab1"  role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>
                            <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>
                            <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Sizing Guide</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tab-content--ys">
                            <div role="tabpanel" class="tab-pane active" id="Tab1">
                                {{$product->description}}
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Tab2">
                                <h5><strong class="color">CUSTOMER REVIEWS {{$product->rates->count()}} ITEM(S)</strong></h5>
                                <div class="divider divider--xs product-info__divider"></div>
                                <div id="rate_list">
                                    @foreach($product->rates as $rate)
                                        @if($rate->status == 1)
                                    <div id="rate{{$rate->id}}">
                                        @foreach($rate->stars as $star)
                                            <span class="fa fa-star" style="color: #e8ea30"></span>
                                        @endforeach
                                        @auth
                                                @if(Auth::user()->isadmin == 1 or Auth::user()->isadmin ==2)
                                                    <span class="pull-right btn btn-xs btn-light delete_rate" data-id="{{$rate->id}}">delete</span>
                                                @endif
                                                @if(Auth::user()->id == $rate->user_id)
                                                    <span class="pull-right btn btn-xs btn-light  edit_rate" data-id="{{$rate->id}}">edit</span>
                                                @endif
                                            @endauth
                                        @if($rate->confirm == 1)
                                    <p style="color: #44cca7">User who bought this product</p>
                                            @endif
                                    <p>{{$rate->content}}</p>
                                    <div class="divider divider--xs"></div>
                                    <p class="color-light">Review by {{$rate->user->name}} / (posted on {{$rate->created_at->diffForHumans()}})</p>
                                    <div class="divider divider--xs"></div>
                                    <div class="divider divider--xs product-info__divider"></div>
                                    </div>
                                        @else
                                            <p>This review is hidden</p>
                                        <div class="divider divider--xs product-info__divider"></div>
                                            @endif
                                    @endforeach
                                </div>
                                @auth
                                <h5><strong class="color">WRITE YOUR OWN REVIEW</strong></h5>
                                <p><span class="color">HOW DO YOU RATE THIS PRODUCT?</span></p>
                                <div class="divider divider--xs"></div>
                                <div id="rating_star">
                                    <span class="fa fa-star-o rate" id="star1" data-id="1"></span>
                                    <span class="fa fa-star-o rate" id="star2" data-id="2"></span>
                                    <span class="fa fa-star-o rate" id="star3" data-id="3"></span>
                                    <span class="fa fa-star-o rate" id="star4" data-id="4"></span>
                                    <span class="fa fa-star-o rate" id="star5" data-id="5"></span><br>
                                    <span style="display: none; color: red;" id="alert_star">Please choose star</span>
                                </div>
                                <div class="divider divider--xs"></div>
                                    <label>Review</label>
                                    <textarea class="textarea--ys input--ys--full" id="rate_contents"></textarea>
                                    <div class="divider divider--xs"></div>
                                    <button class="btn btn--ys text-uppercase" id="btn_review" data-id="{{$product->id}}">Submit Review</button>
                                    @else
                                    <p>Please login to review this product !</p>
                                    <a href="{{asset('/')}}" class="btn btn-primary btn-lg">Login</a>
                                    @endauth
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Tab5">
                                <h5><strong class="color text-uppercase">Clothing - Single Size Conversion (Continued)</strong></h5>
                                <div class="divider divider--xs"></div>
                                <div class="table-responsive">
                                    <table class="table table-params">
                                        <tbody>
                                        <tr>
                                            <td class="text-right"><span class="color">UK</span></td>
                                            <td>
                                                <ul class="sizes-row">
                                                    <li>18</li>
                                                    <li>20</li>
                                                    <li>22</li>
                                                    <li>24</li>
                                                    <li>26</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><span class="color">European</span></td>
                                            <td>
                                                <ul class="sizes-row">
                                                    <li>46</li>
                                                    <li>48</li>
                                                    <li>50</li>
                                                    <li>52</li>
                                                    <li>54</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><span class="color">US</span></td>
                                            <td>
                                                <ul class="sizes-row">
                                                    <li>14</li>
                                                    <li>16</li>
                                                    <li>18</li>
                                                    <li>20</li>
                                                    <li>22</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><span class="color">Australia</span></td>
                                            <td>
                                                <ul class="sizes-row">
                                                    <li>8</li>
                                                    <li>10</li>
                                                    <li>12</li>
                                                    <li>14</li>
                                                    <li>16</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products -->
    <section class="content">
        <div class="container">
            <!-- title -->
            <div class="title-with-button">
                <div class="carousel-products__center pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
                <h2 class="text-left text-uppercase title-under pull-left">WATCHED PRODUCT(S)</h2>
            </div>
            <!-- /title -->
            <!-- carousel -->
            <div class="carousel-products row" id="carouselRelated">
                @if(isset($watched_products))
                @foreach($watched_products as $product)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-one-six">
                    <!-- product -->
                    <div class="product">
                        <div class="product__inside">
                            <!-- product image -->
                            <div class="product__inside__image" style="height: 300px">
                                <a href="{{asset('product/')}}{{$product->slug}}"> <img src="{{asset('')}}{{$product->thumbnail}}" alt="" style="max-height: 300px"> </a>
                            </div>
                            <!-- /product image -->
                            <!-- product name -->
                            <div class="product__inside__name">
                                <h2><a href="{{asset('product/')}}{{$product->slug}}">{{$product->name}}</a></h2>
                            </div>
                            <!-- /product name -->                 <!-- product description -->
                            <!-- visible only in row-view mode -->
                            <div class="product__inside__description row-mode-visible"> {{$product->name}}</div>
                            <!-- /product description -->                 <!-- product price -->
                            <div class="product__inside__price price-box">{{$product->new_price}}<span class="price-box__old">{{$product->old_price}}</span></div>
                            <!-- /product price -->                 <!-- product review -->
                            <!-- visible only in row-view mode -->

                            <!-- /product review -->
                            <div class="product__inside__hover">

                                <!-- product rating -->
                                <div class="rating ">
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
                    @endif
            </div>
            <!-- /carousel -->
        </div>
    </section>


    @endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/shop/custom/detail.js')}}"></script>
    @endsection

@section('modal')
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


    {{--modal remove review --}}


    <div class="modal fade" id="modal_remove">
        <div class="modal-dialog" style="width: 30%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Are you sure to remove this review</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="btn_remove">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal edit --}}
    <div class="modal fade" id="modal_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit review</h4>
                </div>
                <div class="modal-body">
                    <p><span class="color">Edit your review</span></p>
                    <div class="divider divider--xs"></div>
                    <div>
                        <span class="fa fa-star-o star_rate" id="star_1" data-id="1"></span>
                        <span class="fa fa-star-o star_rate" id="star_2" data-id="2"></span>
                        <span class="fa fa-star-o star_rate" id="star_3" data-id="3"></span>
                        <span class="fa fa-star-o star_rate" id="star_4" data-id="4"></span>
                        <span class="fa fa-star-o star_rate" id="star_5" data-id="5"></span><br>
                        <span style="display: none; color: red;" id="alert_edit_star">Please choose star</span>
                    </div>
                    <div class="divider divider--xs"></div>
                    <label>Review</label>
                    <textarea class="textarea--ys input--ys--full" id="edit_content"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_edit">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{--modal reviewed--}}
    <div class="modal fade" id="modal_reviewed">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">You already reviewed this product</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    @endsection