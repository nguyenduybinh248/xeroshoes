//    hover product
var timer;
$(document).on('mouseenter',".product_code",function() {
    var slug = $(this).data('slug');
    timer = setTimeout(function(){
        $.ajax({
            type:'get',
            url:domain + 'admin/export' + '/' + slug,
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

//    show import
$(document).on('click','.btn-info',function () {
    var id = $(this).data('id');
    $.ajax({
        type:'get',
        url:domain +'admin/stockout' + '/' + id,
        success:function(response){
            $('#show_notes').modal('show');
            $('#show_notes_body').html('<p>'+ response.notes +'</p>');
        }
    });
});


//select name
$('#name').blur(function () {
    var val = $(this).val();
    var arr = [];
    $("#products").find("option").each(function() {
        var value = $(this).val();
        arr.push(value);
    });
    var in_arr = arr.includes(val);
    if (val == ''){
        $('#color').empty();
        $('#size').empty();
    }
    else {
        if (in_arr == false) {
            $('#color').empty();
            $('#size').empty();
        }
        else{
            $("#products").find("option").each(function() {
                var abcd = $(this).val();
                var slug = $(this).data('slug');
                if(abcd == val){
                    $.ajax({
                        type: 'get',
                        url: domain + 'admin/export_color/' + slug,
                        success: function (response) {
                            $('#color').html(response.html);
                        }
                    })
                }
            });
        }
    }

});

//select color
$(document).on('click','.color_select',function () {
   var color_id = $(this).val();
   var product_id = $(this).data('product');
   $.ajax({
      type:'get',
      url: domain + 'admin/export_size/',
      data:{
          color_id: color_id,
          product_id: product_id
      },
      success: function (response) {
          $('#size').html(response.html);
      }
   });
});

//max quantity

$(document).on('click','.size_select',function () {
   var id = $(this).data('detail');
   $.ajax({
       type:'get',
       url: domain + 'admin/export_max_qty/' + id,
       success: function (response) {
           $('#quantity').attr('max',response);
       }
   });
});

// save export
$(document).on('click','#export_btn',function () {
   var qty_max =  parseInt($('#quantity').attr('max'));
   var qty =  parseInt($('#quantity').val());
   var name = $('#name').val();
   var color_id = $('#color').val();
   var size_id = $('#size').val();
   var notes = $('#notes').val();
   if (qty > qty_max){
       $('#max_qty').text(qty_max);
       $('#alert_qty').modal('show');
   }
   else {
       $.ajax({
           type: 'post',
           url: domain + 'admin/stockout',
           data:{
               name: name,
               qty: qty,
               color_id: color_id,
               size_id: size_id,
               notes: notes
           },
           success: function (response) {
               $('#add-product').modal('hide');
               toastr.success('success');
               $('#import_tbody').prepend('<tr><td class="stl-column product_code" data-slug="'+ response.slug +'">'+ response.code +'</td><td class="stl-column">'+ response.name +'</td><td class="stl-column">'+ response.color +'</td><td class="stl-column">'+ response.size +'</td><td class="stl-column">'+ response.qty +'</td><td class="stl-column">'+ response.date +'</td><td class="stl-column">'+ response.created +'</td><td class="stl-column"><button class="btn btn-xs btn-info" data-id="'+ response.id +'" >show</button></td></tr>')
           }
       });
   }
});