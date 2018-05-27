
    <h3>{{$cart->name}}</h3>
    <div class="col-xs-4" id="edit_cart_color">
        <h4 id="cart_product_color">{{$cart->options->color}}</h4>
        <select id="select_color_edit">
            @foreach($colors as $color)
                <option value="{{$color->color}}" class="select_color" data-color="{{$color->product_color_id}}">{{$color->color}}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" id="hidden_rowId">
    <div class="col-xs-4" id="edit_cart_size">
        <h4 id="cart_product_size">{{$cart->options->size}}</h4>
        <select id="select_size_edit">
        </select>
    </div>
    <div class="col-xs-4">
        <h4> Quantity: <span id="cart_product_qty">{{$cart->qty}}</span></h4>
        <input type="number" value="{{$cart->qty}}" id="cart_product_quantity">
    </div>
        {{--<div class=" input-counter colxs4" data-row="{{$cart->rowId}}">--}}
            {{--<span class="minus-btn"></span>--}}
            {{--<input type="text" value="{{$cart->qty}}" disabled/>--}}
            {{--<span class="plus-btn"></span>--}}
        {{--</div>--}}
