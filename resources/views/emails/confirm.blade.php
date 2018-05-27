@component('mail::message')
your order is confirmed <br>
Expected delivery date is : {{$order->expected_delivery_date}}<br>
Order: {{$order->order_code}}<br>
@component('mail::table')
    | Product       | Price         | Quantity | Subtotal  |
    | ------------- |:-------------:| --------:|  --------:|
    @foreach($order->order_details as $detail)
        | {{$detail->product_detail->product_color->product->name}} | ${{$detail->price}} | {{$detail->quantity}} |  ${{$detail->price * $detail->quantity}} |
    @endforeach
    |               |               |          |           |
    |               |               | Tax      |  ${{($order->total) * 21 / 121}} |
    |               |               | Total    |  ${{$order->total}}    |
@endcomponent
Thanks,<br>
XEROSHOES
@endcomponent
