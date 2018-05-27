//close modal
$('.modal').on('hidden.bs.modal', function () {
    $('#sale_price').val('');
});

//edit sale price
$(document).on('click', '.btn-warning', function () {
  var id = $(this).data('id');
  $.ajax({
      type: 'get',
      url: domain + 'admin/sale_price/' + id,
      success: function (response) {
          $('#sale_price').attr('data-id',id);
          $('#sale_price').val(response);
          $('#edit_modal').modal('show');
      }
  });
});

//update sale price
$(document).on('click','#edit_btn',function () {
   var id = $('#sale_price').data('id');
   var price = $('#sale_price').val();
   $.ajax({
       type: 'put',
       url: domain + 'admin/edit/sale_price',
       data:{
           id: id,
           price: price
       },
       success: function (response) {
           toastr.success('edit sale price successfully');
           $('#sale'+id).text(response);
           $('#edit_modal').modal('hide');
       }
   });
});

//remove from sale event
$(document).on('click','.btn-danger',function () {
   var product_id = $(this).data('id');
   var event_id = $(this).data('sale');
   $('#hidden_remove').attr('data-product',product_id).attr('data-sale',event_id);
    $('#remove_modal').modal('show');
});

//confirm remove
$(document).on('click','#remove_btn',function () {
    var product_id = $('#hidden_remove').data('product');
    var event_id = $('#hidden_remove').data('sale');
    $.ajax({
        type: 'put',
        url: domain + 'admin/remove/product',
        data:{
            product_id: product_id,
            event_id: event_id
        },
        success: function (response) {
            toastr.success('remove product from sale event successfully');
            $('.tr'+product_id).remove();
            $('#remove_modal').modal('hide');
        }
    });
});