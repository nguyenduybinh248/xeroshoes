<div class="col-xs-12" style="border-bottom: 1px solid #a3b9ac">
    <div class="col-xs-4">
        <img src="{{asset('')}}{{$product->thumbnail}}" style="max-height: 210px; max-width: 100%;display: block; margin: 0 auto;">
    </div>
    <div class="col-xs-8">
        <h3><strong>{{$product->name}}</strong></h3>
        <h5>Product : {{$product->product_code}}</h5>
        <h5>Brand : {{$product->brand_name}}</h5>
        @if($product->type == 0)
            <h5>Type : Women</h5>
        @elseif($product->type == 1)
            <h5>Type : Men</h5>
        @elseif($product->type == 2)
            <h5>Type : Men and Women</h5>
        @else
            <h5>Type : Kid</h5>
        @endif
        <h5>Category: {{$product->category_name}} </h5>
        @if($product->type == 1)
            <h5>Status: Available  </h5>
        @else
            <h5>Status: Unavailable  </h5>
        @endif

            <h5>Original Price : {{$product->original_price}}</h5>
            <h5>Price : {{$product->price}}</h5>
            <h5>Saled Price: {{$product->sale_price}} </h5>

    </div>
</div>
<div class="clearfix"></div>
<div class="col-xs-12">
    <h5><strong>Color</strong> :
        @foreach($product->colors as $color)
            &nbsp; {{$color->color}} &nbsp;
        @endforeach
    </h5>
    <h5><strong>Size</strong> :
        @foreach($product->size as $size)
            &nbsp; {{$size}} &nbsp;
        @endforeach
    </h5>
</div>
<div class="clearfix"></div>
<br>
@foreach($product->color as $colors)
    <div class="col-xs-12" style="border-bottom: 1px solid #a3b9ac">
        @foreach($colors as $color)
            <div class="col-xs-4">
                <h5><span class="span_color" data-id="{{$color->id}}"><strong>Color : {{$color->color}}</strong></span></h5>

                @foreach($color->sizes as $size)
                    <h5> Size : {{$size['size']}}  (Quantity : {{$size['quantity']}})</h5>
                @endforeach
                <div class="modal fade modal_gallery" id="gallery_color_{{$color->id}}">
                    <div class="modal-dialog" style="width: 80%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                                <h4 class="modal-title">Gallery : {{$product->name}} color: {{$color->color}}</h4>
                            </div>
                            <div class="modal-body modal_body">
                                <div class="col-xs-12 gallery" >
                                    @foreach($color->image as $image)
                                        <a href="{{asset('')}}{{$image}}"><img src="{{asset('')}}{{$image}}" style="height: 100px;"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
@endforeach

<div class="clearfix"></div>
<div class="col-xs-12" style="border-bottom: 1px solid #a3b9ac">
    <h4><strong>Description</strong> :</h4>
    <p>{{$product->description}}</p>
</div>
<div class="clearfix"></div>
<br>
<div class="col-xs-12 gallery" >
    <h4><strong>Gallery</strong></h4>
    @foreach($product->gallery as $image)
        <a href="{{asset('')}}{{$image}}"><img src="{{asset('')}}{{$image}}" style="height: 100px;"></a>
    @endforeach
</div>
<div class="clearfix"></div>