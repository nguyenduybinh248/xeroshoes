<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Product</th>
            <th>Color</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>In store</th>
        </tr>
        <tbody id="categorys">
        @foreach($details as $detail)
            <tr>
                <td>{{ $detail->name }}</td>
                <td>{{$detail->color}}</td>
                <td>{{$detail->size}}</td>
                <td>{{$detail->quantity}}</td>
                <td>{{ $detail->in_store }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>