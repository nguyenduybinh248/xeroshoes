
@foreach($products as $product)
    <li style="height: 100px;"><div class="col-xs-12">
        <div class="col-xs-3">
            <a href="{{asset('product')}}/{{$product->slug}}">
            <img src="{{asset('')}}{{$product->thumbnail}}" height="99px" alt="">
            </a>
        </div>
        <div class="col-xs-2">
            <a href="{{asset('product')}}/{{$product->slug}}">
            <strong>{{$product->name}}</strong>
            </a>
        </div>
            <div class="col-xs-2">
                <strong>Brand :{{$product->brand->name}}</strong>
            </div>
            <div class="col-xs-3">
                <strong>Category: {{$product->category->name}}</strong>
            </div>
        <div class="col-xs-2">
            @if($product->is_sale == 1)
                <span class="price-box__new" id="price_new">${{number_format($product->sale_price,'0',',','.')}}</span> <span class="price-box__old" id="price_old">${{number_format($product->price,'0',',','.')}}</span>
            @else
                <span class="price-box__new" id="price_new">${{number_format($product->price,'0',',','.')}}</span>
            @endif
        </div>
        <div class="clearfix"></div>
    </div></li>
    @endforeach