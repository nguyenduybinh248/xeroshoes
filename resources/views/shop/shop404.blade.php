@extends('layouts.shop_layout')
@section('content')
    <div class="container">
        <!-- title -->
        <div class="title-box">
            <h1 class="text-center mega">Ooops!</h1>
        </div>
        <!-- /title -->
        <div class="text-center">
            <img src="{{asset('')}}images/page-404-icon.png" alt="empty cart icon" class="img-responsive-inline" />
            <div class="divider divider--lg"></div>
            <div class="text-with-button">
                <span>You might want to check that URL again or head over to our </span><a class="btn btn--ys" href="{{asset('/')}}"><span class="icon icon-home"></span>homepage</a>
            </div>

        </div>
    </div>
    @endsection