@extends('layouts.admin_layout')
@section('content')
    <button type="button" class="btn btn-xs btn-primary btn-lg" data-toggle="modal" data-target="#add-product">Product out</button>
    <div class="modal fade" id="add-product">
        <div class="modal-dialog" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form method="post" role="form" id="add-new" enctype="multipart/form-data">
                        <datalist id="sizes">
                            @foreach($sizes as $size)
                                <option value="{{$size->size}}">
                            @endforeach
                        </datalist>
                        <div class="col-xs-6">
                            <div class="form-group" id="add-name">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="name" id="name" list="products" autocomplete="off">
                                <datalist id="products">
                                    @foreach($products as $product)
                                        <option value="{{$product->name}}" data-slug="{{$product->slug}}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="color">Color</label>
                            <select id="color" class="form-control">

                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6">
                            <label for="size">Size</label>
                            <select id="size" class="form-control">

                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" class="form-control" placeholder="quantity">
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                        <div class="form-group">
                            <label for="">Notes</label>
                            <textarea  class="form-control" name="notes" placeholder="notes" id="notes" style="border-radius: 15px"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="export_btn">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal show detail--}}
    <div class="modal fade" id="show_detail">
        <div class="modal-dialog modal_body" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div class="modal-body" id="modal_import_body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal show note export--}}
    <div class="modal fade" id="show_notes">
        <div class="modal-dialog" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Notes</h4>
                </div>
                <div class="modal-body" id="show_notes_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <td class="stl-column color-column"><h4>Product</h4></td>
                <td class="stl-column color-column"><h4>Name</h4></td>
                <td class="stl-column color-column"><h4>Color</h4></td>
                <td class="stl-column color-column"><h4>Size</h4></td>
                <td class="stl-column color-column"><h4>Quantity</h4></td>
                <td class="stl-column color-column"><h4>Date</h4></td>
                <td class="stl-column color-column"><h4>Created at</h4></td>
                <td class="stl-column color-column"><h4>Action</h4></td>
            </tr>
            </thead>
            <tbody id="import_tbody">
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
                    <td class="stl-column">
                        <button class="btn btn-xs btn-info" data-id="{{ $detail['id']}}" >show</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$exports->links()}}



    {{--modal alert max quantity--}}
    <div class="modal fade" id="alert_qty">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    This size just has <span id="max_qty"></span> products
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/stockout.js')}}"></script>
    @endsection