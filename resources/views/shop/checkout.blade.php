@extends('layouts.shop_layout')
@section('content')
    <div class="container">
        <!-- title -->
        <div class="title-box">
            <h1 class="text-center text-uppercase title-under">Checkout</h1>
        </div>
        <!-- /title -->
        <div class="row">
            <section class="col-md-8 col-lg-8">
                <!-- checkout-step -->
                <div class="panel-group" id="checkout">
                    <div class="panel panel-checkout" role="tablist">
                        <!-- panel heading -->
                        <div class="panel-heading active" role="tab">
                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#collapseOne">ESTIMATE SHIPPING AND TAX</a> </h4>
                            <div class="panel-heading__number">1</div>
                        </div>
                        <!-- /panel heading -->
                        <!-- panel body -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                @guest
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="number" class="form-control" id="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address">
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control" id="name" value="{{Auth::user()->first_name}}  {{Auth::user()->last_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label><br>
                                        <span>+84</span><input type="number" class="form-control" id="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" value="{{Auth::user()->address}}">
                                    </div>
                                    @endguest
                                    <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- /panel body -->
                    </div>

                    <div class="panel panel-checkout" role="tablist">
                        <!-- panel heading -->
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#collapseFive">ORDER REVIEW</a> </h4>
                            <div class="panel-heading__number">2</div>
                        </div>
                        <!-- /panel heading -->
                        <!-- panel body -->
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel">
                            <div class="panel-body">
                                <div class="clearfix"></div>
                                <div class="btn-top">
                                    <!-- order-review-table -->
                                    <table class="order-review-table">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart as $row)
                                        <tr class="tr_cart">
                                            <td>
                                                <h5 class="order-review-table__product-name text-left text-uppercase">
                                                    <a href="{{asset('product')}}/{{$row->slug}}">{{$row->name}}</a>
                                                </h5>
                                                <ul class="order-review-table__list-parameters">
                                                    <li>
                                                        <span>Color:</span> {{$row->options->color}}
                                                    </li>
                                                    <li>
                                                        <span>Size:</span> {{$row->options->size}}
                                                    </li>
                                                    <li class="visible-xs">
                                                        <span>Price:</span>
                                                        <span class="price-mobile">${{$row->price}}</span>
                                                    </li>
                                                    <li class="visible-xs">
                                                        <span>Qty:</span>
                                                        <span>{{$row->qty}}</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="order-review-table__product-price unit-price">
                                                    ${{$row->price}}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="color">{{$row->qty}}</span>
                                            </td>
                                            <td>
                                                <div class="order-review-table__product-price subtotal">
                                                    ${{$row->subtotal('0',',','.')}}
                                                </div>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- /order-review-table -->
                                    <!-- order-review-total -->
                                    <div class="row clearfix">
                                        <div class="pull-right col-xl-6 col-lg-9 col-md-9 col-xs-12 btn-top">
                                            <div class="order-review-total">
                                                <table class="table-total">
                                                    <tbody>
                                                    <tr>
                                                        <th class="text-left">Subtotal:</th>
                                                        <td class="text-right" id="subtotal">${{Cart::subtotal('0',',','.')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left">Tax:</th>
                                                        <td class="text-right" id="tax">${{Cart::tax('0',',','.')}}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>GRAND TOTAL:</th>
                                                        <td id="total">${{Cart::total('0',',','.')}}</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                <p class="clearfix text-right">
                                                    <a class="btn btn--ys btn--xl" id="order">PLACE ORDER <span class="icon icon--flippedX icon-reply"></span></a>
                                                </p>
                                                <div class="text-right link-top">
                                                    <span class="color-dark">Forgot an Item?</span> <a class="link-underline" href="{{asset('cart')}}">Edit Your Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /order-review-total -->
                                </div>
                            </div>
                        </div>
                        <!-- /panel body -->
                    </div>
                </div>
                <!-- /checkout-step -->
            </section>
            <aside class="col-md-4 col-lg-4 shopping_cart-aside">
                <!--  -->
                <div class="box-border box-border--padding fill-bg">
                    <h4 class="mega title-bottom1">YOUR CHECKOUT PROGRESS</h4>
                    <!--  -->
                    <div class="block-underline-top">
                        <h6 class="small">BILLING ADDRESS</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                            <li><a href="#">Conse ctetur adipisicing </a></li>
                            <li><a href="#">Elit sed do eiusmod tempor</a></li>
                            <li><a href="#">Incididunt ut labore </a></li>
                            <li><a href="#">Et dolore magna aliqua</a></li>
                        </ul>
                    </div>
                    <!-- / -->
                    <!--  -->
                    <!-- / -->
                    <!--  -->
                    <div class="block-underline-top">
                        <h6 class="small">SHIPPING METHOD</h6>
                        <ul class="categories-list">
                            <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        </ul>
                    </div>
                    <!-- / -->

                </div>


            </aside>
        </div>

    </div>

    @endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/shop/checkout.js')}}"></script>
    @endsection