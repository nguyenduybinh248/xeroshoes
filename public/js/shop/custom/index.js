//close modal
$j('#quickViewModal').on('hidden.bs.modal', function () {
    $j('#product_sizes').empty();
});



//quick view
$j(document).on('click','.quick_view_btn',function () {
    var slug = $j(this).data('slug');
    $j.ajax({
        type: 'get',
        url: domain + 'product/view/' + slug,
        success: function (response) {
            $j('#product_thumbnail').attr('src', domain + response.product.thumbnail);
            $j('#product_code').text(response.product.product_code);
            $j('#product_status').text(response.product.status);
            $j('#product_name').text(response.product.name);
            $j('#price_new').text(response.product.new_price);
            $j('#price_old').text(response.product.old_price);
            $j('#product_brand').text(response.product.brand_name);
            $j('#product_brand').text(response.product.brand_name);
            $j('#product_colors').html(response.html);
            $j('#product_sizes').empty();
            $j('#quickViewModal').modal('show');
        }
    });
});

$j(document).on('click','.color_of_product',function () {
   var color = $j(this).data('color');
   $j('.color_of_product').removeClass('color_selected');
   $j(this).addClass('color_selected');
   $j.ajax({
       type: 'get',
       url: domain + 'product/size/' + color,
       success: function (response) {
           $j('#product_sizes').html(response.html);
           $j('#color_error').css('display','none');
       }
   });
});

$j(document).on('click','.size_of_product',function () {
   $j('.size_of_product').removeClass('size_selected');
   $j(this).addClass('size_selected');
   var id = $j(this).data('detail');
   $j.ajax({
       type: 'get',
       url: domain + 'size/quantity/' + id,
       success: function (response) {
           $j('#qty_quickview').attr('max',response);
           $j('#size_error').css('display','none');
       }
   });
});

$j(document).on('click','#product_add_cart',function (e) {
   e.preventDefault();
   var product_color_id = $j('.color_selected').data('color');
   var size_id = $j('.size_selected').data('size');
   var qty = $j('#qty_quickview').val();
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
               $j('#quickViewModal').modal('hide');
               $j('#color_error').css('display','none');
               $j('#size_error').css('display','none');
               $j('#qty_error').css('display','none');
           },
           error: function (xhr, textStatus, errorThrown) {
               var err = xhr.responseJSON.errors;
               if (err['product_color_id']) {
                   $j('#color_error').css('display','block').text(err['product_color_id'][0]);
               }
               else {
                   $j('#color_error').css('display','none');
               }
               if (err['size_id']) {
                   $j('#size_error').css('display','block').text(err['size_id'][0]);
               }
               else {
                   $j('#size_error').css('display','none');
               }
               if (err['qty']) {
                   $j('#qty_error').css('display','block').text(err['qty'][0]);
               }
               else {
                   $j('#qty_error').css('display','none');
               }
           }
       });
   }
});