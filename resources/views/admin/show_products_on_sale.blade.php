<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Product</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Category</th>
        </tr>
        <tbody id="sale_events">
        @foreach($products as $product)
            <tr class="tr{{ $product->slug }}">
                <td>{{ $product->product_code }}</td>
                <td><img src="{{asset('')}}{{ $product->thumbnail }}" style="max-height: 100px;max-width: 100%"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$products->links()}}