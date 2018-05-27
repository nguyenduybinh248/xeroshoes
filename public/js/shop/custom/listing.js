//reset search
$j(document).on('click','.reset_btn',function () {
    var id = $j(this).data('class');
    $j('.'+id).prop('checked', false);
    $j('#hidden_'+id).val('');
});
$j(document).on('click','#reset_price',function () {
    $j('#hidden_prices').val('');
    $j('.prices').val('');
});

//get value search
$j(document).on('click','.sizes',function(){
    var val = $j(this).val();
    $j('#hidden_sizes').val(val);
});

$j(document).on('click','.colors',function(){
    var val = $j(this).val();
    $j('#hidden_colors').val(val);
});

$j(document).on('click','.categories',function(){
    var val = $j(this).val();
    $j('#hidden_categories').val(val);
});

$j(document).on('click','.brands',function(){
    var val = $j(this).val();
    $j('#hidden_brands').val(val);
});

$j(document).on('click','.types',function(){
    var val = $j(this).val();
    $j('#hidden_types').val(val);
});

//search
$j(document).on('click','.to_search',function () {
   var category = $j('#hidden_categories').val();
   var size = $j('#hidden_sizes').val();
   var color = $j('#hidden_colors').val();
   var type = $j('#hidden_types').val();
   var brand = $j('#hidden_brands').val();
   var min_price = $j('#price_min').val();
   var max_price = $j('#price_max').val();
   $j.ajax({
       type:'get',
       url: domain + 'list/search',
       data:{
           category:category,
           size:size,
           color:color,
           type:type,
           brand:brand,
           min_price:min_price,
           max_price:max_price
       },
       success:function (response) {
           $j('#centerColumn').replaceWith(response.html);
       }
   });
});

//paginate
$j(document).ready(function() {
    $j(document).on('click', '.ajax_paginate ul.pagination a', function (e) {
        var category = $j('#hidden_categories').val();
        var size = $j('#hidden_sizes').val();
        var color = $j('#hidden_colors').val();
        var type = $j('#hidden_types').val();
        var brand = $j('#hidden_brands').val();
        var min_price = $j('#price_min').val();
        var max_price = $j('#price_max').val();
        var url = $j(this).attr('href');
        e.preventDefault();
        $j.ajax({
            type:'get',
            url: url,
            data:{
                category:category,
                size:size,
                color:color,
                type:type,
                brand:brand,
                min_price:min_price,
                max_price:max_price
            }
        }).done(function (response) {
            $j('#centerColumn').replaceWith(response.html);
        }).fail(function () {
            alert('error');
        });
    });
});
