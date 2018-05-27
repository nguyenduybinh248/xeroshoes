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
