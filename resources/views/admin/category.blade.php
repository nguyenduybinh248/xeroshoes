@extends('layouts.admin_layout')
@section('page_name')
    CATEGORY
@endsection
@section('content')


    {{--modal add category--}}
    <button type="button" class="btn btn-xs btn-info btn-lg" data-toggle="modal" data-target="#add-cate">Add new category</button>

    <!-- Modal  -->
    <div class="modal fade" id="add-cate" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ADD CATEGORY</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="add-new">
                        @csrf
                        <div class="form-group" id="name-add">
                            <label for="">Category name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                        </div>



                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    {{--search form--}}

    {{--<div class="input-group pull-right search_field" >--}}
        {{--<input type="text" id="search_content" class="form-control fa-search search_content" placeholder="Search...">--}}
    {{--</div>--}}

    {{--list category--}}
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>action</th>
            </tr>
            <tbody id="categorys">
            @foreach($categorys as $category)
                <tr class="tr{{ $category->id }}">
                    <td>{{ $category->id }}</td>
                    <td><a href="/admin/category/{{$category->slug}}">{!! $category->name !!}</a></td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="/admin/category/{{$category->id}}" class="btn btn-xs btn-info">show</a>

                        <button class="btn btn-xs btn-warning"  data-id="{{ $category->id }}">edit</button>
                        <button class="btn btn-xs btn-danger"  data-id="{{ $category->id }}">delete</button>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--modal edit--}}
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">Edit category</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-product" role="form" method="post">
                        <input type="hidden" class="hidden-id-edit">
                        <div class="form-group" id="name-edit">
                            <label for="">name</label>
                            <input type="text" class="form-control" name="name" id="name_edit">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary edit-product">Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{--modal delete--}}
    <div class="modal fade" id="modal-del">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DELETE</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="hidden-id">
                    <h4>Are you sure to delete category : </h4>
                    <p id="name-delete"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary delete-del">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/admin/category.js')}}"></script>

@endsection

