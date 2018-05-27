// input rate
$j('.rate').hover(function () {
    var id =$j(this).data('id');
    var i ;
    for (i = 1; i <= id; i++) {
        $j('#star'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
    }
    for (i = id +1 ; i <= 5; i++) {
        $j('#star'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
    }
}).mouseleave(function () {
    var id  = $j('.rate_selected').data('id');
    var i;
    if (id){
        for (i = 1; i <= id; i++) {
            $j('#star'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
        }
        for (i = id +1 ; i <= 5; i++) {
            $j('#star'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
        }
    }
    else {
        $j('.rate').css('color','').addClass('fa-star-o').removeClass('fa-star');
    }
});
$j(document).on('click','.rate',function () {
    var id =$j(this).data('id');
    $j('.rate').removeClass('rate_selected');
    $j(this).addClass('rate_selected');
});

// input rate edit
$j('.star_rate').hover(function () {
    var id =$j(this).data('id');
    var i ;
    for (i = 1; i <= id; i++) {
        $j('#star_'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
    }
    for (i = id +1 ; i <= 5; i++) {
        $j('#star_'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
    }
}).mouseleave(function () {
    var id  = $j('.rate_edited').data('id');
    var i;
    if (id){
        for (i = 1; i <= id; i++) {
            $j('#star_'+i).css('color','#e8ea30').removeClass('fa-star-o').addClass('fa-star');
        }
        for (i = id +1 ; i <= 5; i++) {
            $j('#star_'+i).css('color','').addClass('fa-star-o').removeClass('fa-star');
        }
    }
    else {
        $j('.star_rate').css('color','').addClass('fa-star-o').removeClass('fa-star');
    }
});
$j(document).on('click','.star_rate',function () {
    var id =$j(this).data('id');
    $j('.star_rate').removeClass('rate_edited');
    $j(this).addClass('rate_edited');
});





//select color
$j(document).on('click','.color_of_product',function () {
    var color = $j(this).data('color');
    $j('.color_of_product').removeClass('color_selected');
    $j(this).addClass('color_selected');
    $j.ajax({
        type: 'get',
        url: domain + 'product/size/' + color,
        success: function (response) {
            $j('#product_sizes').html(response.html);
        }
    });
});
//select size
$j(document).on('click','.size_of_product',function () {
    $j('.size_of_product').removeClass('size_selected');
    $j(this).addClass('size_selected');
    var id = $j(this).data('detail');
    $j.ajax({
        type: 'get',
        url: domain + 'size/quantity/' + id,
        success: function (response) {
            $j('#qty_quickview').attr('max',response);
        }
    });
});

//add to cart
$j(document).on('click','#product_add_cart',function (e) {
    e.preventDefault();
    var product_color_id = $j('.color_selected').data('color');
    var size_id = $j('.size_selected').data('size');
    var qty = parseInt($j('#qty_quickview').val());
    var qty_max =parseInt($j('#qty_quickview').attr('max'));
    if (qty_max < qty) {
        $j('#max_qty').text(qty_max);
        $j('#alert_qty').modal('show');
    }
    else {
        $j.ajax({
            type: 'post',
            url: domain + 'add/cart',
            data:{
                product_color_id: product_color_id,
                size_id: size_id,
                qty: qty
            },
            success: function (response) {
                toastr.success('add product to cart successfully');
                $j('#cart_count').text(response.cart_number);
            }
        });
    }
});



//add review
$j(document).on('click','#btn_review',function () {
    var star = $j('.rate_selected').data('id');
    var id = $j(this).data('id');
    var contents = $j('#rate_contents').val();
    if (star) {
        $j('#alert_star').css('display','none');
        $j.ajax({
            type: 'post',
            url: domain + 'rate',
            data:{
              id: id,
              star: star,
              contents: contents
            },
            success: function (response) {
                if (response.error) {
                   $j('#modal_reviewed').modal('show');
                }
                else {
                    toastr.success('add review successfully');
                    $j('#rate_list').append(response.html);
                }
            }
        });
    }
    else {
        $j('#alert_star').css('display','block');
    }
});



//show edit
$j(document).on('click','.edit_rate',function () {
   var id = $j(this).data('id');
   $j.ajax({
       type: 'get',
       url: domain + 'rate/' + id,
       success: function (response) {
           $j('#edit_content').val(response.content);
           $j('#modal_edit').modal('show');
           $j('#btn_edit').attr('data-id',id);
       }
   });
});

//edit
$j(document).on('click','#btn_edit',function () {
   var id = $j(this).data('id');
   var star = $j('.rate_edited').data('id');
   var contents = $j('#edit_content').val();
    if (star) {
        $j('#alert_edit_star').css('display','none');
        $j.ajax({
            type: 'put',
            url: domain + 'rate',
            data:{
                id: id,
                star: star,
                contents: contents
            },
            success: function (response) {
                toastr.success('edit review successfully');
                $j('#rate'+id).replaceWith(response.html);
                $j('#modal_edit').modal('hide');
            }
        });
    }
    else {
        $j('#alert_edit_star').css('display','block');
    }
});

//hide review
$j(document).on('click','.delete_rate',function () {
   var id = $j(this).data('id');
   $j('#btn_remove').attr('data-id',id);
   $j('#modal_remove').modal('show');
});
$j(document).on('click','#btn_remove',function () {
    var id = $j(this).data('id');
    $j.ajax({
        type:'delete',
        url: domain + 'admin/rate/' + id,
        success: function (response) {
            toastr.success('remove review successfully');
            $j('#rate'+id).remove();
            $j('#modal_remove').modal('hide');
        }
    });
});
