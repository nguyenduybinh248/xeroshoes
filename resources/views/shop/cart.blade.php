@extends('layouts.shop_layout')
@section('content')
<div class="container">
    <!-- title -->
    <div class="title-box">
        <h1 class="text-center text-uppercase title-under">SHOPPING CART</h1>
    </div>
    <!-- /title -->
    <div class="row">
        <section class="col-md-8 col-lg-8">
            <!-- Shopping cart table -->
            <div class="container-widget">
                <table class="shopping-cart-table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $row)
                    <tr id="tr{{$row->rowId}}" class="row_cart">
                        <td>
                            <div class="shopping-cart-table__product-image">
                                <a href="{{asset('product')}}/{{$row->slug}}">
                                    <img class="img-responsive" src="{{asset('')}}{{$row->thumbnail}}" alt="">
                                </a>
                            </div>
                        </td>
                        <td>
                            <h5 class="shopping-cart-table__product-name text-left text-uppercase">
                                <a href="{{asset('product')}}/{{$row->slug}}">{{$row->name}}</a>
                            </h5>
                            <ul class="shopping-cart-table__list-parameters">
                                <li><span>Color:</span> {{$row->options->color}}</li>
                                <li><span>Size:</span> {{$row->options->size}}</li>
                                <li class="visible-xs">
                                    <span>Price:</span>
                                    <span class="price-mobile">${{$row->price('0',',','.')}}</span>
                                </li>
                                <li class="visible-xs">
                                    <span>Qty:</span>
                                    <!--  -->
                                    <div class="number input-counter">
                                        {{--<span class="minus-btn"></span>--}}
                                        {{--<input type="text" value="{{$row->qty}}" disabled size="5"/>--}}
                                        {{--<span class="plus-btn"></span>--}}
                                        <p>{{$row->qty}}</p>
                                    </div>
                                    <!-- / -->
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a class="shopping-cart-table__create icon icon-create " data-row="{{$row->rowId}}"></a>
                            <a class="shopping-cart-table__delete icon icon-delete visible-xs" href="#"></a>
                        </td>
                        <td>
                            <div class="shopping-cart-table__product-price unit-price">
                                ${{$row->price('0',',','.')}}
                            </div>
                        </td>
                        <td>
                            <div class="shopping-cart-table__input">
                                <!--  -->
                                <div class="number input-counter" data-row="{{$row->rowId}}">
                                    {{--<span class="minus-btn"></span>--}}
                                    {{--<input type="text" value="{{$row->qty}}" disabled size="5"/>--}}
                                    {{--<span class="plus-btn"></span>--}}
                                    <p>{{$row->qty}}</p>
                                </div>
                                <!-- / -->
                            </div>
                        </td>
                        <td>
                            <div class="shopping-cart-table__product-price subtotal">
                                ${{$row->subtotal('0',',','.')}}
                            </div>
                        </td>
                        <td>
                            <a class="shopping-cart-table__delete icon icon-clear" data-row="{{$row->rowId}}"></a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /Shopping cart table -->
            <!-- button -->
            <div class="divider divider--xs"></div>
            <div class="row shopping-cart-btns">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <a class="btn btn--ys btn--light pull-left btn-right" href="{{asset('/')}}"><span class="icon icon-keyboard_arrow_left"></span>CONTINUE SHOPPING </a>
                    <div class="divider divider--xs visible-xs"></div>
                    {{--<a class="btn btn--ys btn--light" id="destroy_cart"><span class="icon icon-delete"></span>CLEAR SHOPPING CART</a>--}}
                </div>
                <div class="divider divider--xs visible-xs"></div>
                <div class="col-xs-12 col-sm-4 col-md-4 pull-left">
                    <a class="btn btn--ys btn--light" id="destroy_cart"><span class="icon icon-delete"></span>CLEAR SHOPPING CART</a>
                </div>
            </div>
            <!-- /button -->
            <div class="divider visible-sm visible-xs"></div>
        </section>
        <aside class="col-md-4 col-lg-4 shopping_cart-aside">
            <!-- GRAND TOTAL -->
            <div class="card card--padding fill-bg">
                <table class="table-total">
                    <tbody>
                    <tr>
                        <th class="text-left">Subtotal:</th>
                        <td class="text-right" id="cart_subtotal">${{Cart::subtotal('0',',','.')}}</td>
                    </tr>
                    <tr>
                        <th class="text-left">Tax:</th>
                        <td class="text-right" id="cart_tax">${{Cart::tax('0',',','.')}}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>GRAND TOTAL:</th>
                        <td id="cart_total_price">${{Cart::total('0',',','.')}}</td>
                    </tr>
                    </tfoot>
                </table>
                <a href="{{asset('checkout')}}" class="btn btn--ys btn--full btn--xl">PROCEED TO CHECKOUT <span class="icon icon-reply icon--flippedX"></span></a>
            </div>
            <!-- /GRAND TOTAL -->
        </aside>
    </div>

</div>
    @endsection

@section('modal')
    <div class="modal fade" id="modal_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit cart</h4>
                </div>
                <div class="modal-body" id="body_edit_cart">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_change_cart">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


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
<script type="text/javascript" src="{{asset('js/shop/cart.js')}}"></script>
    @endsection