@component('mail::message')
Your order was canceled.<br>
Reason :  {{$email->reason}}<br>
Order: {{$email->order->order_code}}<br>
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
