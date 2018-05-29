function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.blah')
                .attr('src', e.target.result)
                .height(150)
                .width('auto')
                .css('display','block');

        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('textarea').ckeditor();
//close modal
$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
    $('.modalclose').remove();
    $('.blah').css('display', 'none');
});
//show edit modal
$(document).on('click','.btn-warning',function () {
    var slug = $(this).data('slug');
    $('#edit_product').modal('show');
    $('#hidden_edit').val(slug);
    $.ajax({
        type:'get',
        url: domain + 'admin/product/' + slug,
        success:function(response){
            $('#edit_name').val(response.name);
            $('#edit_price').val(response.price);
            $('#edit_brand').val(response.brandname);
            $('#category_id').val(response.category_id);
            $('#edit_type').val(response.type);
            $('#edit_description').val(response.description);
            $('.blah').attr('src', domain + response.thumbnail).css('display', 'block');
            $('#hidden_thumbnail').val(response.thumbnail);
        }
    });
});

//update edit

$(document).on('click','.edit_product',function () {
    var slug = $('#hidden_edit').val();
    var name = $('#edit_name').val();
    var price = $('#edit_price').val();
    var sale_price = $('#edit_sale_price').val();
    var brand = $('#edit_brand').val();
    var category_id = $('#category_id').val();
    var type = $('#edit_type').val();
    var description = $('#edit_description').val();
    if ($('#thumbnail').val()){
        var thumbnail = 'storage/images/' + $('#thumbnail')[0].files[0]['name'];
    }
    else {
        var thumbnail = $('#hidden_thumbnail').val();
    }
    var formdata = new FormData($("#add_thumbnail")[0]);
    $.ajax({
        type:'post',
        url: domain + 'admin/postimg',
        data:formdata,
        cache:false,
        dataType:'text',
        processData: false,
        contentType: false,
        success:function(response){
            console.log(response);
        }
    });
    $.ajax({
        type:'put',
        url: domain + 'admin/product/'+ slug,
        data:{
            name: name,
            brand: brand,
            category_id: category_id,
            type: type,
            price: price,
            sale_price: sale_price,
            thumbnail: thumbnail,
            description: description
        },
        success:function(response){
            $('#edit_product').modal('hide');
            toastr.success('edit product successfully');
            if (response.is_sale == 1){
                var sale = 'Sale';
            }
            else {
                var sale = 'Not Sale';
            }
            $('.tr'+response.id).replaceWith('<tr class="'+ response.id +'" data-id="'+ response.id +'"><td class="stl-column"><img src="' + domain + response.thumbnail +'" width="50px" height="50px"></td><td class="stl-column">'+ response.name +'</td><td class="stl-column">'+ response.brand_name +'</td><td class="stl-column">'+ response.category_name +'</td><td class="stl-column">'+ response.original_price +'</td><td class="stl-column">'+ response.price +'</td><td class="stl-column">'+ sale +'</td><td class="stl-column">'+ response.sale_price +'</td><td class="stl-column">'+ response.quantity +'</td><td class="stl-column">'+ response.star +' Star</td><td class="stl-column">'+ response.created +'</td><td class="stl-column">'+ response.updated +'</td><td class="stl-column"><button class="btn btn-xs btn-info" data-slug="'+ response.slug +'" >show</button><button class="btn btn-xs btn-warning"  data-slug="'+ response.slug +'">edit</button><button class="btn btn-xs btn-danger"  data-slug="'+ response.slug +'">delete</button></td></tr>');
        }
    });
});

//show modal delete

$(document).on('click','.btn-danger',function () {
    var slug = $(this).data('slug');
    $('#delete_product').modal('show');
    $.ajax({
        type:'get',
        url:domain + 'admin/product/' + slug,
        success:function(response){
            $('#hidden_delete').val(response.id);
            $('.delete_product_name').text(response.name);
            $('.delete_product_image').attr('src', domain +response.thumbnail).css('display','block');
        }
    });

});
//delete
$(document).on('click','.btn_delete',function () {
   var id = $('#hidden_delete').val();
   $.ajax({
       type:'delete',
       url: domain + 'admin/product/' + id,
       success:function(response){
           toastr.success('edit product successfully');
           $('.delete_product_name').text();
           $('.delete_product_image').attr('src','').css('display','none');
           $('#delete_product').modal('hide');
           $('.tr'+id).remove();
       }
   });
});

//show product detail
$(document).on('click','.btn-info',function () {
    var slug = $(this).data('slug');
    $.ajax({
        type: 'get',
        url: domain + 'admin/show/'+ slug,
        success: function (response) {
            $('#show_detail').modal('show');
            $('.detail_body').html(response.html);
        }
    });
});

//hover color
var timer;
$(document).on('mouseenter',".span_color",function() {
    var id = $(this).data('id');
    timer = setTimeout(function(){
        $('#gallery_color_'+id).modal('show');
    }, 1000);
}).on('mouseleave','.span_color',function() {
    clearTimeout(timer);
});
$(document).on('mouseleave','.modal_body',function() {
    $('.modal_gallery').modal('hide');
});
$(document).on('mouseleave','.detail_body',function() {
    $('.modal_gallery').modal('hide');
    $('#show_detail').modal('hide');
});
