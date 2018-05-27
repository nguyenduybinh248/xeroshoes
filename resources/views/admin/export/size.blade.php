@foreach($details as $detail)
    <option value="{{$detail->size->id}}" class="size_select" data-detail="{{$detail->id}}">{{$detail->size->size}}</option>
    @endforeach