@extends('layouts.admin_layout')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Customer's Name</th>
                <th> Customer's Email</th>
                <th> Expected received date</th>
                <th> Received date</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            <tbody id="orders">
            @foreach($orders as $order)
                <tr class="tr{{ $order->id }}">
                    <td>{{ $order->order_code }}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->expected_delivery_date}}</td>
                    <td>{{$order->delivery_date}}</td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <button class="btn btn-xs btn-info" data-id="{{$order->id}}">show</button>
                        <button class="btn btn-xs btn-success confirm" data-id="{{$order->id}}">confirm</button>
                        <button class="btn btn-xs btn-danger cancel" data-id="{{$order->id}}">cancel</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- ===================MODAL==================================   --}}
    {{-- ==========================================================   --}}



    {{--modal show order detail--}}
    <div class="modal fade" id="show_details">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body" id="show_order_body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{$orders->links()}}
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/orders/order_received.js')}}"></script>
@endsection