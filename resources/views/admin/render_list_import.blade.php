<div class="table-reponsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="stl-column color-column"><h4>Product</h4></th>
            <th class="stl-column color-column"><h4>Name</h4></th>
            <th class="stl-column color-column"><h4>Color</h4></th>
            <th class="stl-column color-column"><h4>Size</h4></th>
            <th class="stl-column color-column"><h4>Quantity</h4></th>
            <th class="stl-column color-column"><h4>Date</h4></th>
            <th class="stl-column color-column"><h4>Created at</h4></th>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $detail)
            <tr class="tr{{ $detail['id']}}" data-id="{{ $detail['id']}}">
                <td class="stl-column product_code" data-slug="{{$detail['product']->slug}}">
                    {{$detail['product']->product_code}}
                </td>
                <td class="stl-column">{{$detail['product']->name}}</td>
                <td class="stl-column">{{$detail['color']}}</td>
                <td class="stl-column">{{$detail['size']}}</td>
                <td class="stl-column">{{$detail['quantity']}}</td>
                <td class="stl-column">{{$detail['date']}}</td>
                <td class="stl-column">{{$detail['created_at']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$details->links()}}