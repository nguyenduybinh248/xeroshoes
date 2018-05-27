@foreach($colors as $color)
    <option value="{{$color->id}}" data-product="{{$id}}" class="color_select">{{$color->color}}</option>
    @endforeach