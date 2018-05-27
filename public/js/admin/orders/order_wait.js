//show info order
$(document).on('click','.btn-info',function () {
    var id = $(this).data('id');
    $.ajax({
        type:'get',
        url: domain + 'admin/order/' + id,
        success: function (response) {
            $('#show_order_body').html(response.html);
            $('#show_details').modal('show');
        }
    });
});


//cancel order
$(document).on('click','.cancel',function () {
    var id = $(this).data('id');
    $('#hidden_cancel').val(id);
    $('#cancel_order').modal('show');
});
$(document).on('click','#btn_cancel',function () {
    var id =  $('#hidden_cancel').val();
    var reason =  $('#reason').val();
    $.ajax({
        type:'put',
        url: domain + 'admin/order/cancel/' + id,
        data:{
            reason: reason
        },
        success: function (response) {
            $('#cancel_order').modal('hide');
            toastr.success('cancel order successfully');
            $('.tr'+ id).remove();
        }
    });
});
