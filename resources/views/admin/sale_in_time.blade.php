@extends('layouts.admin_layout')
@section('content')

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
                    <td><a href="{{asset('admin/sale-products')}}/{{$event->id}}">{{ $event->title }}</a></td>
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

    @endsection