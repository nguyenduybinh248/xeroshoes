$j(document).ready(function () {
    var email = $j(this).val();
    $j.ajax({
        type: 'get',
        url: domain + 'checkout/email',
        data:{
            email: email
        },
        success: function (response) {
            $j('#name').val(response.name);
            $j('#phone').val(response.phone );
            $j('#address').val(response.address);
        }
    });
});

$j('#email').blur(function () {
    var email = $j(this).val();
    $j.ajax({
        type: 'get',
        url: domain + 'checkout/email',
        data:{
            email: email
        },
        success: function (response) {
          $j('#name').val(response.name);
          $j('#phone').val(response.phone );
          $j('#address').val(response.address);
        }
    });
});

//add order

$j(document).on('click','#order',function () {
   var email =$j('#email').val();
   var phone =$j('#phone').val();
   var address =$j('#address').val();
   var name =$j('#name').val();
   $j.ajax({
      type: 'post',
       url: domain + 'checkout',
       data:{
          email: email,
           phone: phone,
           address: address,
           name: name
       },
       success: function (response) {
          if (response.error) {
              var error = response.error;
              var mess = [];
              $j.each(error, function(idx2,val2) {
                  var str = val2;
                  mess.push(str);
              });
              var messa = mess.join(" . ");
              toastr.error(messa);
          }
          else {
              toastr.success('your order is sent');
              $j('.tr_cart').remove();
              $j('#subtotal').text('$0');
              $j('#tax').text('$0');
              $j('#total').text('$0');
              $j('#cart_count').text('0');
          }
       }
   });
});