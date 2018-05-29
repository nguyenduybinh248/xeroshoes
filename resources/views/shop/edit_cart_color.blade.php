<div class="modal-body col-xs-12" id="body_edit_cart">
    <h5>{{$cart->name}}</h5>
    <div class="col-xs-4" id="edit_cart_color">
        <h4 id="cart_product_color">Color</h4>
        <select id="select_color_edit">
            @foreach($colors as $color)
                <option value="{{$color->color}}" class="select_color" data-color="{{$color->product_color_id}}">{{$color->color}}</option>
            @endforeach
        </select>
        <p id="edit_error_color" style="color: crimson;display: none"></p>
    </div>
    <input type="hidden" id="hidden_rowId">
    <div class="col-xs-4" id="edit_cart_size">
        <h4 id="cart_product_size">Size</h4>
        <select id="select_size_edit">
        </select>
        <span>(* choose color firt to choose size)</span>
        <p id="edit_error_size" style="color: crimson;display: none"></p>
    </div>
    <div class="col-xs-4">
        <h4> Quantity: <span id="cart_product_qty">{{$cart->qty}}</span></h4>
        <input type="number" value="{{$cart->qty}}" id="cart_product_quantity">
        <p id="edit_error_qty" style="color: crimson;display: none"></p>
    </div>
</div>
        {{--<div class=" input-counter colxs4" data-row="{{$cart->rowId}}">--}}
            {{--<span class="minus-btn"></span>--}}
            {{--<input type="text" value="{{$cart->qty}}" disabled/>--}}
            {{--<span class="plus-btn"></span>--}}
        {{--</div>--}}
