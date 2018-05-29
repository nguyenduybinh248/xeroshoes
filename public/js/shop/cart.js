// destroy cart
$j(document).on('click','#destroy_cart',function () {
   $j.ajax({
       type : 'delete' ,
       url: domain + 'cart/destroy/',
       success: function () {
           toastr.success('delete cart successfully');
           $j('.row_cart').remove();
           $j('#cart_subtotal').text('$0');
           $j('#cart_tax').text('$0');
           $j('#cart_total_price').text('$0');
           $j('#cart_count').text('0');
       }
   });
});

//remove 1 item on cart
$j(document).on('click','.shopping-cart-table__delete',function () {
    var rowId = $j(this).data('row');
    $j.ajax({
        type: 'delete',
        url: domain + 'cart/destroy/' + rowId,
        success: function (response) {
            toastr.success('delete product from cart successfully');
            $j('#tr'+rowId).remove();
            $j('#cart_subtotal').text('$' + response.subtotal);
            $j('#cart_tax').text('$' + response.tax);
            $j('#cart_total_price').text('$' + response.total);
            $j('#cart_count').text(response.count);
        }
    });
});


//edit cart
$j(document).on('click','.shopping-cart-table__create',function () {
    var rowId = $j(this).data('row');
    $j.ajax({
        type: 'get',
        url: domain + 'cart/edit/' + rowId,
        success: function (response) {
            $j('#body_edit_cart').replaceWith(response.html);
            $j('#modal_edit').modal('show');
            $j('#hidden_rowId').val(rowId);
        }
    });
});
//edit size
$j(document).on('click','.select_color',function () {
   var product_color_id = $j(this).data('color');
   var value = $j(this).text();
   $j.ajax({
       type: 'get',
       url: domain + 'cart/size/edit/' + product_color_id,
       success: function (response) {
           $j('#select_size_edit').html(response.html);
           $j('#cart_product_color').text(value);
           $j('#edit_error_color').css('display','none');
       }
   });
});

//select size
$j(document).on('click','.select_size',function () {
   var size = $j(this).text();
   $j('#cart_product_size').text(size);
   var id = $j(this).data('size');
   $j.ajax({
       type:'get',
       url: domain + 'cart/size/' + id,
       success: function (response) {
           $j('#cart_product_quantity').attr('max',response);
           $j('#edit_error_size').css('display','none');
       }
   });
});

//save change

$j(document).on('click','#btn_change_cart',function (e) {
   e.preventDefault();
   var size = $j('#select_size_edit').val();
   var color = $j('#select_color_edit').val();
   var qty = parseInt($j('#cart_product_quantity').val());
   var qty_max = parseInt($j('#cart_product_quantity').attr('max'));
   var rowId = $j('#hidden_rowId').val();
   if (qty_max < qty ) {
       $j('#max_qty').text(qty_max);
       $j('#alert_qty').modal('show');
   }
   else {
       $j.ajax({
           type: 'put',
           url: domain + 'cart/edit/' + rowId ,
           data:{
               size: size,
               color: color,
               qty: qty
           },
           success:  function (response) {
               toastr.success('edit cart successfully');
               $j('#tr'+rowId).replaceWith(response.html);
               $j('#cart_subtotal').text('$' + response.subtotal);
               $j('#cart_tax').text('$' + response.tax);
               $j('#cart_total_price').text('$' + response.total);
               $j('#modal_edit').modal('hide');
               $j('#edit_error_color').css('display','none');
               $j('#edit_error_size').css('display','none');
               $j('#edit_error_qty').css('display','none');
           },
           error: function (xhr, textStatus, errorThrown) {
               var err = xhr.responseJSON.errors;
               if (err['color']) {
                   $j('#edit_error_color').css('display','block').text(err['color'][0]);
               }
               else {
                   $j('#edit_error_color').css('display','none');
               }
               if (err['size']) {
                   $j('#edit_error_size').css('display','block').text(err['size'][0]);
               }
               else {
                   $j('#edit_error_size').css('display','none');
               }
               if (err['qty']) {
                   $j('#edit_error_qty').css('display','block').text(err['qty'][0]);
               }
               else {
                   $j('#edit_error_qty').css('display','none');
               }
           }
       });
   }
});
