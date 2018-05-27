<h3>your order is confirmed</h3>
<table>
    <thead>
    <tr>
        <th>product</th>
        <th>price</th>
        <th>quantity</th>
        <th>subtotal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->order_details as $detail)
    <tr>
        <td>{{$detail->product_detail->product_color->product->name}}</td>
        @if($detail->product_detail->product_color->product->is_sale == 1)
            <td>{{$detail->product_detail->product_color->product->sale_price}}</td>
            <td>{{$detail->quantity}}</td>
            <td>{{$detail->product_detail->product_color->product->sale_price * $detail->quantity}}</td>
            @else
            <td>{{$detail->product_detail->product_color->product->price}}</td>
            <td>{{$detail->quantity}}</td>
            <td>{{$detail->product_detail->product_color->product->price * $detail->quantity}}</td>
            @endif
    </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th></th>
        <th>Tax</th>
        <th>{{($order->total) * 21 / 121}}</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th>Total</th>
        <th>{{$order->total}}</th>
    </tr>
    </tfoot>
</table>