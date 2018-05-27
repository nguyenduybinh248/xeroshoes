@extends('layouts.admin_layout')
@section('content')
    <input type="text" value="" class="slider form-control" data-slider-min="-200" data-slider-max="200"
           data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
           data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">

    <p>data-slider-id="red"</p>

<span class="fa fa-star-o rate" id="star1" data-id="1"></span>
<span class="fa fa-star-o rate" id="star2" data-id="2"></span>
<span class="fa fa-star-o rate" id="star3" data-id="3"></span>
<span class="fa fa-star-o rate" id="star4" data-id="4"></span>
<span class="fa fa-star-o rate" id="star5" data-id="5"></span>
@endsection
@section('script')
    <script>


        $('.slider').slider();



        $('.rate').hover(function () {
           var id =$(this).data('id');
           var i ;
            for (i = 1; i <= id; i++) {
                $('#star'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
            }
            for (i = id +1 ; i <= 5; i++) {
                $('#star'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
            }
        }).mouseleave(function () {
           var id  = $('.rate_selected').data('id');
           var i;
           if (id){
               for (i = 1; i <= id; i++) {
                   $('#star'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
               }
               for (i = id +1 ; i <= 5; i++) {
                   $('#star'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
               }
           }
           else {
               $('.rate').css('color','').addClass('fa-star-o').removeClass('fa-star');
           }

        });
        $(document).on('click','.rate',function () {
            var id =$(this).data('id');
            $('.rate').removeClass('rate_selected');
            $(this).addClass('rate_selected');
        });
    </script>
    @endsection