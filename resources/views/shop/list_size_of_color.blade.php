@foreach($sizes as $size)
    <li><a class="size_of_product" data-detail="{{$size->id}}" data-size="{{$size->size->id}}">{{$size->size->size}}</a></li>
@endforeach