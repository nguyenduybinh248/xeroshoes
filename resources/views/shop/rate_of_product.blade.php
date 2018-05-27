<div id="rate{{$rate->id}}">
    @foreach($rate->stars as $star)
        <span class="fa fa-star" style="color: #e8ea30"></span>
    @endforeach
    @auth
        @if(Auth::user()->isadmin == 1 or Auth::user()->isadmin ==2)
            <span class="pull-right btn btn-xs btn-light delete_rate" data-id="{{$rate->id}}">delete</span>
        @endif
        @if(Auth::user()->id == $rate->user_id)
            <span class="pull-right btn btn-xs btn-light  edit_rate" data-id="{{$rate->id}}">edit</span>
        @endif
        @endauth
    @if($rate->confirm == 1)
        <p style="color: #44cca7">User who bought this product</p>
    @endif
    <p>{{$rate->content}}</p>
    <div class="divider divider--xs"></div>
    <p class="color-light">Review by {{$rate->user->name}} / (posted on {{$rate->created_at->diffForHumans()}})</p>
    <div class="divider divider--xs"></div>
    <div class="divider divider--xs product-info__divider"></div>
</div>