// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('.blah')
//                 .attr('src', e.target.result)
//                 .height(150)
//                 .width('auto')
//                 .css('display','block');
//
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }
function readdURL(input) {
    if (input.files && input.files[0]) {
        var path = 'storage/images/' + input.files[0]['name'];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#sale_banner_edit').css('display','none');
            $('#hidden_banner').val(path);
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

// mouse out
$(document).on('mouseleave','.gallery_body',function() {
    $('#gallery_banner').modal('hide');
});
//select how to choose banner
$(document).on('click','.select_banner',function () {
   var val = $(this).val();
   if (val == 1){
        $('#gallery_banner').modal('hide');
        $('.device_banner').remove();
        $('.form_sale').append('<div class="device_banner"><div class="form-group col-xs-6" id="add_thumbnail"><label for="">Banner</label><input type="file" class="form-control" name="thumbnail" id="thumbnail" onchange="readdURL(this);"><input type="hidden" id="hidden_thumbnail"></div><div class="col-xs-6"><img class="blah" src="#" style="display: none; max-height: 100px; max-width: 100%" /></div></div>')
   }
   else {
        $('.device_banner').remove();
        $('#gallery_banner').modal('show');
   }
});
//select image from gallery
$('.gallery > img').on('click',function () {
    $('.banner_selected').removeClass('banner_selected');
    $(this).addClass('banner_selected');
});
$('#select_banner_btn').on('click',function () {
    $('#gallery_banner').modal('hide');
   var path = $('.banner_selected') .data('path');
   $('#hidden_banner').val(path);
    $('.banner_selected').removeClass('banner_selected');
    $('#sale_banner_edit').css('display','none');
});

//choose products on sale
$('#choose_products').on('click',function () {
    $('#choose_products_modal').modal('show');
    $.ajax({
        type:'get',
        url: domain + 'admin/sale/create',
        success:function(response){
            $('#choose_products_body').html(response.html);
        }
    });
});
$(document).on('click','.choose_product',function () {
   $(this).toggleClass('product_selected');
});
var arr_products = [];
$(document).on('click','#add_sale_products',function () {
    arr_products = [];
    $('#choose_products_modal').modal('hide');
    $('.product_selected').each(function () {
       var slug = $(this).data('slug');
        arr_products.push(slug);
    });
    $('.product_selected').removeClass('product_selected');
});
// add sale event
$(document).on('click','#add_sale_btn',function (e) {
    e.preventDefault();
    var title = $('#title').val();
    var begin_date = $('#begin_date').val();
    var end_date = $('#end_date').val();
    var content = $('#content').val();
    var banner = $('#hidden_banner').val();
    var formdata = new FormData($("#form_add_sale")[0]);
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
        type:'post',
        url: domain + 'admin/sale',
        data:{
            title : title,
            begin_date : begin_date,
            end_date : end_date,
            contents : content,
            banner : banner,
            products : arr_products
        },
        success:function(response){
            $('#add-sale').modal('hide');
            $('#hidden_banner').val('');
            toastr.success('add sale_event successfully');
            $('#sale_events').prepend('<tr class="tr'+ response.slug +'"><td>'+ response.title +'</td><td><img src="' + domain + response.banner +'" style="max-height: 100px;max-width: 100%"></td><td>'+ response.begin_date +'</td><td>'+ response.end_date +'</td><td>'+ response.created +'</td><td>'+ response.updated +'</td><td><button class="btn btn-xs btn-info" data-slug="'+ response.slug +'">show</button>&nbsp;<button class="btn btn-xs btn-warning"  data-slug="'+ response.slug +'">edit</button>&nbsp;<button class="btn btn-xs btn-danger"  data-slug="'+ response.slug +'">delete</button></td></tr>');
        }
    });
});


//show products on sale
$(document).on('click','.btn-info',function () {
   var slug = $(this).data('slug');
   $.ajax({
       type:'get',
       url: domain + 'admin/sale/' + slug,
       success: function (response) {
           $('#show_products_body').html(response.html);
           $('#show_products').modal('show');
       }
   });
});

// ajax paginate show products on sale
$(document).ready(function() {
    $(document).on('click', '#show_products_body ul.pagination a', function (e) {
        var url = $(this).attr('href');
        e.preventDefault();
        $.ajax({
            url : url
        }).done(function (response) {
            $('#show_products_body').html(response.html);
        }).fail(function () {
            alert('error');
        });
    });
});

$(document).on('mouseleave','.modal_show_products',function() {
    $('#show_products_body').empty();
    $('#show_products').modal('hide');
});

//edit sale event

$(document).on('click','.btn-warning',function () {
    var slug = $(this).data('slug');
    $.ajax({
        type:'get',
        url: domain + 'admin/sale/' + slug + '/edit',
        success:function(response){
            arr_products = response.arr_products;
            console.log(arr_products);
            $('#edit-sale').modal('show');
            $('#hidden_edit').val(slug);
            $('#edit_title').val(response.title);
            $('#edit_begin_date').val(response.begin_date);
            $('#edit_end_date').val(response.end_date);
            $('#edit_content').val(response.content);
            $('#hidden_banner').val(response.banner);
            $('#sale_banner_edit').attr('src',domain + response.banner).css('display','block');
        }
    });
});
//choose products edit sale
$('#edit_products_on_sale').on('click',function () {
    var slug = $('#hidden_edit').val();
    $('#choose_products_modal').modal('show');
    $.ajax({
        type:'get',
        url: domain + 'admin/sale/edit/' + slug,
        success:function(response){
            $('#choose_products_body').html(response.html);
        }
    });
});

//update edit
$('#edit_sale_btn').on('click',function (e) {
    e.preventDefault();
    console.log('a');
    var title = $('#edit_title').val();
    var begin_date = $('#edit_begin_date').val();
    var end_date = $('#edit_end_date').val();
    var content = $('#edit_content').val();
    var banner = $('#hidden_banner').val();
    var formdata = new FormData($("#form_edit_sale")[0]);
    var slug = $('#hidden_edit').val();
    var products = arr_products;
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
        url: domain + 'admin/sale/' + slug,
        data:{
            title : title,
            begin_date : begin_date,
            end_date : end_date,
            contents : content,
            banner : banner,
            products : arr_products
        },
        success:function(response){
            $('#edit-sale').modal('hide');
            $('#hidden_banner').val('');
            toastr.success('edit sale_event successfully');
            $('#sale_events').prepend('<tr class="tr'+ response.slug +'"><td>'+ response.title +'</td><td><img src=' + domain + response.banner +'" style="max-height: 100px;max-width: 100%"></td><td>'+ response.begin_date +'</td><td>'+ response.end_date +'</td><td>'+ response.created +'</td><td>'+ response.updated +'</td><td><button class="btn btn-xs btn-info" data-slug="'+ response.slug +'">show</button>&nbsp;<button class="btn btn-xs btn-warning"  data-slug="'+ response.slug +'">edit</button>&nbsp;<button class="btn btn-xs btn-danger"  data-slug="'+ response.slug +'">delete</button></td></tr>');
        }
    });
});