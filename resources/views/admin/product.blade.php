@extends('layouts.admin_layout')
@section('content')
    <datalist id="brands">
        @foreach($brands as $brand)
            <option value="{{$brand->name}}">
        @endforeach
    </datalist>
    <div class="modal fade" id="edit_product">
        <div class="modal-dialog" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_edit" >
                    <div class="col-xs-12">
                        <div class="form-group col-xs-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control"  placeholder="name" id="edit_name">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">Brand</label>
                            <input type="text" class="form-control"  placeholder="brand" id="edit_brand" autocomplete="off" list="brands">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="form-group col-xs-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <label for="">Category</label>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <select class="form-control" name="category_id" id="category_id">
                                            @foreach ($categorys as $category)
                                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-xs-6">
                             <label for="">Price</label>
                             <input type="number" class="form-control" name="price"  placeholder=" Price" id="edit_price">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <label for="">Type</label>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <select class="form-control" id="edit_type">
                                        <option value="0" >Women</option>
                                        <option value="1" >Men</option>
                                        <option value="2" >Women and men</option>
                                        <option value="3" >Kid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">Sale Price</label>
                            <input type="number" class="form-control"  placeholder="Sale Price" id="edit_sale_price">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <form method="post" enctype="multipart/form-data" id="add_thumbnail">
                        <div class="form-group col-xs-6" id="add_thumbnail">
                            <label for="">Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail" onchange="readURL(this);">
                            <input type="hidden" id="hidden_thumbnail">
                        </div>
                        </form>
                        <div class="col-xs-6">
                            <img class="blah" src="#" style="display: none; max-height: 100px; max-width: 100%" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea  class="form-control" placeholder="description" id="edit_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit_product">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="delete_product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detele</h4>
                </div>
                <div class="modal-body">
                    <h3>Are you sure to delete this product?</h3>
                    <div class="col-xs-12">
                        <div class="col-xs-6 delete_product_name"></div>
                        <div class="col-xs-6">
                            <img src="" class="delete_product_image" width="100px" height="100px" style="display: none">
                        </div>
                    </div>
                    <input type="hidden" id="hidden_delete">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary btn_delete">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal detail--}}
    <div class="modal fade" id="show_detail">
        <div class="modal-dialog" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail</h4>
                </div>
                <div class="modal-body detail_body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <td class="stl-column color-column"><h4>Thumbnail</h4></td>
                <td class="stl-column color-column"><h4>Name</h4></td>
                <td class="stl-column color-column"><h4></h4>Brand</td>
                <td class="stl-column color-column"><h4>Category</h4></td>
                <td class="stl-column color-column"><h4>Original Price</h4></td>
                <td class="stl-column color-column"><h4>Price</h4></td>
                <td class="stl-column color-column"><h4>Sale</h4></td>
                <td class="stl-column color-column"><h4>Sale Price</h4></td>
                <td class="stl-column color-column"><h4>Quantity</h4></td>
                <td class="stl-column color-column"><h4>Rate</h4></td>
                <td class="stl-column color-column"><h4>Created at</h4></td>
                <td class="stl-column color-column"><h4>Updated at</h4></td>
                <td class="stl-column color-column"><h4>Action</h4></td>
            </tr>
            </thead>
            <tbody id="product_tbody">
            @foreach($products as $product)
                <tr class="tr{{ $product->id}}" data-id="{{ $product->id}}">
                    <td class="stl-column"><img src="{{asset('')}}{{$product->thumbnail}}" width="50px" height="50px"></td>
                    <td class="stl-column">{{$product->name}}</td>
                    <td class="stl-column">{{$product->brand->name}}</td>
                    <td class="stl-column">{{$product->category->name}}</td>
                    <td class="stl-column">{{$product->original_price}}</td>
                    <td class="stl-column">{{$product->price}}</td>
                    <td class="stl-column">
                        @if($product->is_sale == 1)
                            Sale
                            @else
                            Not Sale
                        @endif
                    </td>
                    <td class="stl-column">{{$product->sale_price}}</td>
                    <td class="stl-column">{{$product->quantity}}</td>
                    <td class="stl-column">{{$product->star}} Star</td>
                    <td class="stl-column">{{$product->created}}</td>
                    <td class="stl-column">{{$product->updated}}</td>
                    <td class="stl-column">
                        <button class="btn btn-xs btn-info" data-slug="{{ $product->slug}}" >show</button>
                        <button class="btn btn-xs btn-warning"  data-slug="{{ $product->slug}}">edit</button>
                        <button class="btn btn-xs btn-danger"  data-slug="{{ $product->slug}}">delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$products->links()}}


    @endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/product.js')}}"></script>
@endsection