@extends('layouts.admin_layout')
@section('content')
    <input type="hidden" id="hidden_banner">
    <button type="button" class="btn btn-xs btn-primary btn-lg" data-toggle="modal" data-target="#add-sale">Add new sale event</button>

    {{--modal add sale event--}}
    <div class="modal fade" id="add-sale">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add sale event</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" id="form_add_sale" class="form_sale">
                        <div class=" form-group col-xs-12">
                            <label for="">Title</label>
                            <input type="text" class="form-control"  placeholder="Title" id="title">
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group col-xs-6">
                            <label for="">Begin Date</label>
                            <input type="date" class="form-control"  placeholder="Begin Date" id="begin_date">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">End Date</label>
                            <input type="date" class="form-control"  placeholder="End Date" id="end_date">
                        </div>

                        <div class="clearfix"></div>
                        <div class=" form-group col-xs-12">
                            <label for="">Content</label>
                            <textarea class="form-control" id="content"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <a class="btn btn-primary" id="choose_products">Choose products on sale</a>
                        </div>
                        <br>
                        <div class="clearfix"></div>
                        <div class="col-xs-4">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <label for="">Sale event's banner</label>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <select class="form-control" id="select_banner">
                                        <option value="2" >Select from gallery</option>
                                        <option value="1" >Select from your device</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_sale_btn">Add</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal edit sale event--}}
    <div class="modal fade" id="edit-sale">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit sale event</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" id="form_edit_sale" class="form_sale">
                        <input type="hidden" id="hidden_edit">
                        <div class=" form-group col-xs-12">
                            <label for="">Title</label>
                            <input type="text" class="form-control"  placeholder="Title" id="edit_title">
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group col-xs-6">
                            <label for="">Begin Date</label>
                            <input type="date" class="form-control"  placeholder="Begin Date" id="edit_begin_date">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">End Date</label>
                            <input type="date" class="form-control"  placeholder="End Date" id="edit_end_date">
                        </div>

                        <div class="clearfix"></div>
                        <div class=" form-group col-xs-12">
                            <label for="">Content</label>
                            <textarea class="form-control" id="edit_content"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <a class="btn btn-primary" id="edit_products_on_sale">Choose products on sale</a>
                        </div>
                        <br>
                        <div class="clearfix"></div>
                        <div class="col-xs-4">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <label for="">Sale event's banner</label>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <select class="form-control select_banner">
                                        <option value="2" >Select from gallery</option>
                                        <option value="1" >Select from your device</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <img src="" id="sale_banner_edit" style="display: none; height: 150px">
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit_sale_btn">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @if(Auth::user()->isadmin == 2)
    {{--modal delete--}}
    <div class="modal fade" id="delete-sale">
        <div class="modal-dialog" style="width: 30%">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Are you sure to delete this sale event ?</h3>
                    <p id="delete_title"></p>
                    <input type="hidden" id="hidden_detele">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="btn_delete_sale">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif

    {{--modal select image from gllery--}}
    <div class="modal fade" id="gallery_banner">
        <div class="modal-dialog gallery_body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Gallery</h4>
                </div>
                <div class="modal-body">
                    <div class="gallery">
                        @foreach($images as $image)
                            <img src="{{asset('')}}{{$image->path}}" style="height: 100px; margin: 5px" data-path="{{$image->path}}">
                            @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="select_banner_btn">Select</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--modal choose products --}}
    <div class="modal fade" id="choose_products_modal">
        <div class="modal-dialog choose_product_modal" style="width: 40%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Choose products on sale</h4>
                </div>
                <div class="modal-body" id="choose_products_body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_sale_products">Select products</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{--table list sale--}}

    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Banner</th>
                <th>Begin Date</th>
                <th>End Date</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>action</th>
            </tr>
            <tbody id="sale_events">
            @foreach($sale_events as $event)
                <tr class="tr{{ $event->slug }}">
                    <td>{{ $event->title }}</td>
                    <td><img src="{{asset('')}}{{ $event->banner }}" style="max-height: 100px;max-width: 100%"></td>
                    <td>{{$event->begin_date}}</td>
                    <td>{{$event->end_date}}</td>
                    <td>{{ $event->created_at->diffForHumans() }}</td>
                    <td>{{ $event->updated_at->diffForHumans() }}</td>
                    <td>
                        <button class="btn btn-xs btn-info" data-slug="{{ $event->slug }}">show</button>
                        <button class="btn btn-xs btn-warning"  data-slug="{{ $event->slug }}">edit</button>
                        @if(Auth::user()->isadmin == 2)
                        <button class="btn btn-xs btn-danger"  data-slug="{{ $event->slug }}">delete</button>
                            @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--modal show products on sale--}}
    <div class="modal fade" id="show_products">
        <div class="modal-dialog modal_show_products">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Products on sale</h4>
                </div>
                <div class="modal-body" id="show_products_body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/sale.js')}}"></script>
    @if(Auth::user()->isadmin == 2)
    <script type="text/javascript" src="{{asset('js/admin/delete_sale.js')}}"></script>
    @endif
    @endsection