<tr id="tr{{$row->rowId}}" class="row_cart">
    <td>
        <div class="shopping-cart-table__product-image">
            <a href="{{asset('')}}{{$row->slug}}">
                <img class="img-responsive" src="{{asset('')}}{{$row->thumbnail}}" alt="">
            </a>
        </div>
    </td>
    <td>
        <h5 class="shopping-cart-table__product-name text-left text-uppercase">
            <a href="{{asset('')}}{{$row->slug}}">{{$row->name}}</a>
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