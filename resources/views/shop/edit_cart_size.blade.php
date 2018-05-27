@foreach($details as $detail)
    <option value="{{$detail->size->size}}" data-size="{{$detail->id}}" class="select_size">{{$detail->size->size}}</option>
    @endforeach