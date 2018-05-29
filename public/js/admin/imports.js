// show image when choose file
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
//show mutiple images

function readdURL(input) {
    if (input.files) {
        var number = $(input).attr('data-number');
        var n = 0;
        $('.gallery'+number).replaceWith('<div class="gallery'+ number +' col-xs-12"></div>');
        $(input.files).each(function () {
            var i = n.toString();
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.gallery'+number).append('<img class="blah'+ i+ number +'" src="#" />');
                $('.blah'+i+ number)
                    .attr('src', e.target.result)
                    .height(150)
                    .width('auto')
            };
            reader.readAsDataURL(input.files[i]);
            n +=1;
        });
    }
}

//close modal
$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
    $('.modalclose').remove();
    $('.blah').css('display', 'none');
});

//add color
$(document).on('click','#btn_color',function () {
    var number = $(this).data('number');
    var number = Number(number);
    number += 1;
    $('#details').append('<div id="detail'+ number +'" data-number="'+ number +'" class="detail"><br><br><br><br><div class="form-group col-xs-4"><label for="">Color<button type="button" class="btn btn-light btn-xs color_remove" data-color="'+ number +'"><span class="glyphicon glyphicon-minus">Remove</span></button></label><input type="text" class="form-control" placeholder="color" id="color'+ number +'" list="colors" autocomplete="off"></div><div class="col-xs-8" id="size_color'+  number+'"><button type="button" class="btn btn-xs btn_size" data-color="'+ number +'" data-number="1" id="btn_color'+ number +'"><span class="glyphicon glyphicon-plus"> More size</span></button><span id="color'+ number +'_detail1" class="color'+ number +'_detail" data-size="1"><div class="form-group col-xs-4" ><label for="">Size</label><input type="number" class="form-control" placeholder="size" id="color'+ number +'_size1" list="sizes" autocomplete="off"></div><div class="form-group col-xs-4" ><label for="">Quantity</label><input type="number" class="form-control" placeholder="quantity" id="color'+ number +'_qty1"></div></span><div class="clearfix"></div></div><div class="col-xs-12"><h4>Images</h4><input type="file" id="a'+ number +'" class="form-control gallerys" data-number="'+ number +'" multiple name="gallery[]" onchange="readdURL(this);"></div><div class="clearfix"></div><div class="gallery'+ number +' col-xs-12"></div><div class="clearfix"></div></div><div class="clearfix"></div>');
    $('#btn_color').data('number', number);
});
//add size and quantity
$(document).on('click', '.btn_size' , function () {
    var number =  $(this).data('number');
    var number = Number(number);
    number += 1;
    var color =  $(this).data('color');
    $('#size_color'+color).append('<div id="color'+ color +'_detail'+ number +'" class="color'+ color +'_detail" data-size="'+ number +'"><div class="form-group col-xs-4" ><label for="">Size<button type="button" class="btn btn-light btn-xs size_remove" data-color="'+ color +'" data-number="'+ number +'"><span class="glyphicon glyphicon-minus">Remove</span></button></label><input type="number" class="form-control" placeholder="size" id="color'+ color +'_size'+ number +'" list="sizes" autocomplete="off"></div><div class="form-group col-xs-4" ><label for="">Quantity</label><input type="number" class="form-control" placeholder="quantity" id="color'+ color +'_qty'+ number +'"></div></div><div class="clearfix"></div>');
    $('#btn_color'+color).data('number', number);
});
//    remove color
$(document).on('click','.color_remove',function () {
    var color = $(this).data('color');
    $('#detail'+color).remove();
});
//    remove size quantity
$(document).on('click','.size_remove',function () {
    var number =  $(this).data('number');
    var color =  $(this).data('color');
    $('#color'+ color +'_detail'+ number).remove();
});

//    select datalist name
$('#name').blur(function () {
    var val = $(this).val();
    var arr = [];
    $("#products").find("option").each(function() {
        var value = $(this).val();
        arr.push(value);
    });
    var in_arr = arr.includes(val);
    if (val == ''){
        $('#product_details').css('display','none');
        $('#brand').val('');
        $("#brand").prop('disabled', false);
        $('#original_price').val('');
        $("#original_price").prop('disabled', false);
        $('#category_id').val('');
        $("#category_id").prop('disabled', false);
        $('#type').val('');
        $("#type").prop('disabled', false);
        $("#thumbnail").prop('disabled', false);
        $("#hidden_thumbnail").prop('disabled', false);
        $("#hidden_thumbnail").val('');
        $('.blah').attr('src', '');
        $('.blah').css('display', 'none');
        $('#description').val('');
        $("#description").prop('disabled', false);
        CKEDITOR.instances['description'].setReadOnly(false);
    }
    else {
        if (in_arr == false) {
            $('#product_details').css('display','block');
            $('#brand').val('');
            $("#brand").prop('disabled', false);
            $('#original_price').val('');
            $("#original_price").prop('disabled', false);
            $('#category_id').val('');
            $("#category_id").prop('disabled', false);
            $('#type').val('');
            $("#type").prop('disabled', false);
            $("#thumbnail").prop('disabled', false);
            $("#hidden_thumbnail").prop('disabled', false);
            $("#hidden_thumbnail").val('');
            $('.blah').attr('src', '');
            $('.blah').css('display', 'none');
            $('#description').val('');
            $("#description").prop('disabled', false);
            CKEDITOR.instances['description'].setReadOnly(false);
        }
        else{
            $("#products").find("option").each(function() {
                var abcd = $(this).val();
                var slug = $(this).data('slug');
                if(abcd == val){
                    $('#product_details').css('display','block');
                    $.ajax({
                        type: 'get',
                        url: domain + 'admin/product/' + slug,
                        success: function (response) {
                            $('#brand').val(response.brandname);
                            $("#brand").prop('disabled', true);
                            $('#original_price').val(response.original_price);
                            $("#original_price").prop('disabled', true);
                            $('#category_id').val(response.category_id);
                            $("#category_id").prop('disabled', true);
                            $('#type').val(response.type);
                            $("#type").prop('disabled', true);
                            $("#thumbnail").prop('disabled', true);
                            $("#hidden_thumbnail").val(response.thumbnail);
                            $("#hidden_thumbnail").prop('disabled', true);
                            $('.blah').attr('src', domain + response.thumbnail);
                            $('.blah').css('display', 'block');
                            $('#description').val(response.description);
                            $("#description").prop('disabled', true);
                            CKEDITOR.instances['description'].setReadOnly(true);
                        }
                    })
                }
            });
        }
    }

});
$('textarea').ckeditor();
// add product
$('.stock_in').on('click',function (e) {
    e.preventDefault();
    var name = $('#name').val();
    var brand = $('#brand').val();
    var category_id = $('#category_id').val();
    var type = $('#type').val();
    var original_price = $('#original_price').val();
    if ($('#thumbnail').val()){
        var thumbnail = $('#thumbnail')[0].files[0]['name'];
    }
    else {
        var thumbnail = $('#hidden_thumbnail').val();
    }
    var description = $('#description').val();
    var notes = $('#notes').val();
    var arr = [];
    $('.detail').each(function () {
        var color_number= $(this).data('number');
        var color = $('#color'+color_number).val();
        var files = $('#a'+color_number)[0].files;
        var images = {};
        var u = 0;
        $(files).each(function () {
            images[u] = files[u]['name'];
            u += 1;
        });
        var color_detail = {};
        var n = 0;
        $('.color'+color_number+'_detail').each(function () {
            var size_number = $(this).data('size');
            var size = $('#color'+color_number+'_size'+size_number).val();
            var qty = $('#color'+color_number+'_qty'+size_number).val();
            color_detail[n] = {'size': size, 'quantity': qty};
            n += 1;
        });
        var detail = {'color': color, 'details': color_detail, 'images': images};
        arr.push(detail);
    });
    console.log(arr);
    //    upload image
    var formdata = new FormData($("#add-new")[0]);
    $.ajax({
        type:'post',
        url: domain + 'admin/postimg',
        data:formdata,
        cache:false,
        dataType:'text',
        // async:false,
        processData: false,
        contentType: false,
        success:function(response){
            console.log(response);
        }
    });
    $.ajax({
        type:'post',
        url:domain + 'admin/stockin',
        data:{
            name: name,
            brand: brand,
            category_id: category_id,
            type: type,
            original_price: original_price,
            thumbnail: thumbnail,
            description: description,
            notes: notes,
            product_details: arr
        },
        success:function(response){
            $('#add-product').modal('hide');
            toastr.success('add products successfully');
            var n = 0;
            $(response.details).each(function () {
                $('#import_tbody').prepend('<tr class="tr'+ response.details[n]['id'] +'" data-id="'+ response.details[n]['id'] +'"><td class="stl-column product_code" data-slug="'+ response.product.slug +'">'+ response.product.product_code +'</td><td class="stl-column">'+ response.product.name +'</td><td class="stl-column">'+ response.details[n]['color'] +'</td><td class="stl-column">'+ response.details[n]['size'] +'</td><td class="stl-column">'+ response.details[n]['quantity'] +'</td><td class="stl-column">'+ response.details[n]['date'] +'</td><td class="stl-column">'+ response.details[n]['created_at'] +'</td><td class="stl-column"><button class="btn btn-xs btn-info" data-id="'+ response.details[n]['id'] +'" >show</button>&nbsp;<button class="btn btn-xs btn-warning"  data-id="'+ response.details[n]['id'] +'">edit</button>&nbsp;<button class="btn btn-xs btn-danger"  data-id="'+ response.details[n]['id'] +'">delete</button></td></tr>');
                n += 1;
            });
        }
    });
});

//ajax paginate
$(document).ready(function() {
    $(document).on('click', '#modal_import_body ul.pagination a', function (e) {
        var url = $(this).attr('href');
        e.preventDefault();
        $.ajax({
            url : url
        }).done(function (response) {
            $('#modal_import_body').html(response.html);
        }).fail(function () {
            alert('error');
        });
    });
});

//    hover product
var timer;
$(document).on('mouseenter',".product_code",function() {
    var slug = $(this).data('slug');
    timer = setTimeout(function(){
        $.ajax({
            type:'get',
            url:domain + 'admin/import' + '/' + slug,
            success:function(response){
                $('#modal_import_body').html(response.html);
            }
        });
        $('#show_detail').modal('show');
    }, 1000);
}).on('mouseleave','.product_code',function() {
    clearTimeout(timer);
});
$(document).on('mouseleave','.modal_body',function() {
    $('#modal_import_body').empty();
    $('#show_detail').modal('hide');
});

//    show import
$(document).on('click','.btn-info',function () {
    var id = $(this).data('id');
    $.ajax({
        type:'get',
        url:domain + 'admin/stockin' + '/' + id,
        success:function(response){
            $('#show_notes').modal('show');
            $('#show_notes_body').html('<p>'+ response.notes +'</p>');
        }
    });
});