@extends('layouts.admin_layout')
@section('content')
    <button type="button" class="btn btn-xs btn-primary btn-lg" data-toggle="modal" data-target="#add-product">Add new product</button>
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
                        <div class="col-xs-4">
                            <div class="form-group" id="add-name">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" id="name" list="products" autocomplete="off">
                                <datalist id="products">
                                    @foreach($products as $product)
                                        <option value="{{$product->name}}" data-slug="{{$product->slug}}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="col-xs-8" id="product_details" style="border-radius: 20px; border: 2px solid #77dca8; background-color:#ccfbe3; display: none">
                            <h3>Product's detail</h3>
                            <div class="col-xs-6">
                                <div class="form-group" id="add-brand">
                                    <label for="">Brand</label>
                                    <input type="text" class="form-control" name="brand" placeholder="brand" id="brand" list="brands" autocomplete="off">
                                    <datalist id="brands">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->name}}">
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-xs-6">
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
                            <div class="clearfix"></div>
                            <div class="col-xs-6">
                                <div class="form-group" id="add_original_price">
                                    <label for="">Original Price</label>
                                    <input type="number" class="form-control" name="original_price"  placeholder="Original Price" id="original_price">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <label for="">Type</label>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <select class="form-control" name="type" id="type">
                                            <option value="0" >Women</option>
                                            <option value="1" >Men</option>
                                            <option value="2" >Women and men</option>
                                            <option value="3" >Kid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-6">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-xs-6" id="add_thumbnail">
                                <label for="">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" onchange="readURL(this);">
                                <input type="hidden" id="hidden_thumbnail">
                            </div>
                            <div class="col-xs-6">
                                <img class="blah" src="#" style="display: none; max-height: 100px; max-width: 100%" />
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group" id="add_description">
                                <label for="">Description</label>
                                <textarea  class="form-control des_area" name="description" placeholder="description" id="description" style="border-radius: 15px"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="details">
                            <datalist id="colors">
                                @foreach($colors as $color)
                                    <option value="{{$color->color}}">
                                @endforeach
                            </datalist>
                            <button type="button" class="btn btn-light btn-xs" id="btn_color" data-number="1">
                                <span class="glyphicon glyphicon-plus"> More color</span>
                            </button>
                            <div class="clearfix"></div>
                            <div id="detail1" data-number="1" class="detail">
                                <div class="form-group col-xs-4">
                                    <label for="">
                                        Color
                                    </label>
                                    <input type="text" class="form-control" placeholder="color" id="color1" list="colors" autocomplete="off">
                                </div>
                                <div class="col-xs-8" id="size_color1">
                                    <button type="button" class="btn btn-xs btn_size" data-color="1" data-number="1" id="btn_color1">
                                        <span class="glyphicon glyphicon-plus"> More size</span>
                                    </button>
                                    <span id="color1_detail1" class="color1_detail" data-size="1">
                    <div class="form-group col-xs-4">
                        <label for="">Size</label>
                        <input type="number" class="form-control" placeholder="size" id="color1_size1" list="sizes" autocomplete="off">
                    </div>
                    <div class="form-group col-xs-4" id="div_c1_q1">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" placeholder="quantity" id="color1_qty1">
                    </div>
                </span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-xs-12">
                                    <h4>Images</h4>
                                    <input type="file" class="form-control gallerys" id="a1" data-number="1" multiple name="gallery[]" onchange="readdURL(this);">
                                </div>
                                <div class="clearfix"></div>
                                <div class="gallery1 col-xs-12">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
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
                    <button type="submit" class="btn btn-primary stock_in">ADD</button>
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

    {{--modal show note import--}}
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
@if (Auth::user()->isadmin == 2)
        {{--modal edit--}}
    <div class="modal fade" id="edit_import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hidden_edit">
                    <div class="form-group col-xs-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="name" id="name_edit" list="products" autocomplete="off">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="form-group col-xs-3">
                            <label for="">Color</label>
                            <input type="text" class="form-control" placeholder="color" id="color_edit" list="colors" autocomplete="off">
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="">Size</label>
                            <input type="number" class="form-control" placeholder="Size" id="size_edit" list="sizes" autocomplete="off">
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" placeholder="quantity" id="quantity_edit">
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="">Date</label>
                            <input type="date" class="form-control" placeholder="date" id="date_edit">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="">Notes</label>
                        <textarea id="note_edit" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_edit">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal delete--}}
    <div class="modal fade" id="delete_import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    <h3>Are you sure to delete this ?</h3>
                    <input type="hidden" id="hidden_delete">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_delete">Delete</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endif

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
                        @if (Auth::user()->isadmin == 2)
                        <button class="btn btn-xs btn-warning"  data-id="{{ $detail['id']}}">edit</button>
                        <button class="btn btn-xs btn-danger"  data-id="{{ $detail['id']}}">delete</button>
                            @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$imports->links()}}
    {{--=====================================--}}
    {{--=====================================--}}
    {{--=====================================--}}
    {{--=====================================--}}
    {{--script--}}

    <script type="text/javascript">

    </script>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/admin/imports.js')}}"></script>
@if (Auth::user()->isadmin == 2)
<script type="text/javascript" src="{{asset('js/admin/edit_delete_import.js')}}"></script>
@endif
@endsection