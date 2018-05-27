@extends('layouts.admin_layout')
@section('content')
{{--modal edit sale_price--}}
<div class="modal fade" id="edit_modal">
    <div class="modal-dialog" style="width: 30%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit sale price</h4>
            </div>
            <div class="modal-body">
                <div class="form-group col-xs-6">
                    <label for="sale_price">Sale Price</label>
                    <input type="number" class="form-control"  placeholder="Sale price" id="sale_price">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit_btn">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{--modal confirm remove--}}
<div class="modal fade" id="remove_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Are you sure to remove this product from sale event</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hidden_remove">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="remove_btn">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<h3>{{$event->title}}</h3>
<div class="table-responsive">
    <table class="table" >
        <thead>
        <tr>
            <td class="stl-column color-column"><h4>Thumbnail</h4></td>
            <td class="stl-column color-column"><h4>Name</h4></td>
            <td class="stl-column color-column"><h4></h4>Brand</td>
            <td class="stl-column color-column"><h4>Category</h4></td>
            <td class="stl-column color-column"><h4>Price</h4></td>
            <td class="stl-column color-column"><h4>Sale Price</h4></td>
            <td class="stl-column color-column"><h4>Rate</h4></td>
            <td class="stl-column color-column"><h4>Action</h4></td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="tr{{$product->id}}" data-id="{{ $product->id}}">
                <td class="stl-column"><img src="{{asset('')}}{{$product->thumbnail}}" width="50px" height="50px"></td>
                <td class="stl-column">{{$product->name}}</td>
                <td class="stl-column">{{$product->brand->name}}</td>
                <td class="stl-column">{{$product->category->name}}</td>
                <td class="stl-column">{{$product->price}}</td>
                <td class="stl-column" id="sale{{$product->id}}">{{$product->sale_price}}</td>
                <td class="stl-column">{{$product->star}} Star</td>
                <td class="stl-column">
                    <button class="btn btn-xs btn-warning"  data-id="{{ $product->id}}">edit sale price</button>
                    <button class="btn btn-xs btn-danger"  data-id="{{ $product->id}}" data-sale="{{$event->id}}">remove from event</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$products->links()}}


@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/sale_product.js')}}"></script>
    @endsection