
//delete sale event
$(document).on('click','.btn-danger',function () {
    var slug = $(this).data('slug');
    $.ajax({
        type:'get',
        url:'http://xeroshoes.shop/admin/sale/' + slug + '/edit',
        success:function(response){
            $('#delete_title').text(response.title);
            $('#hidden_detele').val(slug);
            $('#delete-sale').modal('show');
        }
    });
});
$(document).on('click','#btn_delete_sale',function () {
    var slug = $('#hidden_detele').val();
    $.ajax({
        type:'delete',
        url:'http://xeroshoes.shop/admin/sale/' + slug,
        success:function(response){
            $('#hidden_detele').val('');
            toastr.success('delete sale_event successfully');
            $('#delete-sale').modal('hide');
            $('.tr'+response.slug).remove();
        }
    });
});