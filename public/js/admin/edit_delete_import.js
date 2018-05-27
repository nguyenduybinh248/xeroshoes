//   show delete modal
$(document).on('click', '.btn-danger',function () {
    var id = $(this).data('id');
    $('#delete_import').modal('show');
    $('#hidden_delete').val(id);
});
//    delete import
$(document).on('click','.btn_delete',function () {
    var id = $('#hidden_delete').val();
    $.ajax({
        type:'delete',
        url:'http://xeroshoes.shop/admin/stockin' + '/' + id,
        success:function(response){
            $('#delete_import').modal('hide');
            toastr.success('Delete successfully');
            $('.tr'+id).remove();
        }
    });
});

//   show edit modal
$(document).on('click', '.btn-warning',function () {
    var id = $(this).data('id');
    $('#edit_import').modal('show');
    $('#hidden_edit').val(id);
    $.ajax({
        type:'get',
        url:'http://xeroshoes.shop/admin/stockin' + '/' + id,
        success:function(response){
            $('#name_edit').val(response.name);
            $("#name_edit").prop('disabled', true);
            $('#color_edit').val(response.color);
            $('#date_edit').val(response.date);
            $('#size_edit').val(response.size);
            $('#quantity_edit').val(response.quantity);
            $('#note_edit').val(response.notes);
        }
    });
});

//    edit import
$(document).on('click','.btn_edit',function () {
    var id = $('#hidden_edit').val();
    $.ajax({
        type:'put',
        url:'http://xeroshoes.shop/admin/stockin' + '/' + id,
        data:{
            'color':$('#color_edit').val(),
            'size':$('#size_edit').val(),
            'date':$('#date_edit').val(),
            'quantity':$('#quantity_edit').val(),
            'notes':$('#note_edit').val()
        },
        success:function(response){
            $('#edit_import').modal('hide');
            toastr.success('Edit successfully');
            $('.tr'+id).replaceWith('<tr class="tr'+ response.id +'" data-id="'+ response.id +'"><td class="stl-column product_code" data-slug="'+ response.product.slug +'">'+ response.product.product_code +'</td><td class="stl-column">'+ response.product.name +'</td><td class="stl-column">'+ response.color +'</td><td class="stl-column">'+ response.size +'</td><td class="stl-column">'+ response.quantity +'</td><td class="stl-column">'+ response.date +'</td><td class="stl-column">'+ response.created_at +'</td><td class="stl-column"><button class="btn btn-xs btn-info" data-id="'+ response.id +'" >show</button>&nbsp;<button class="btn btn-xs btn-warning"  data-id="'+ response.id +'">edit</button>&nbsp;<button class="btn btn-xs btn-danger"  data-id="'+ response.id +'">delete</button></td></tr>');
        }
    });
});