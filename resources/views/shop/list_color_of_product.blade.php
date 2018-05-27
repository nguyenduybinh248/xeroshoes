@foreach($colors as $color)
    <li style="list-style-type: none; display: inline-block"><a class="color_of_product" data-color="{{$color->product_color}}">{{$color->color}}</a></li>&nbsp;
@endforeach