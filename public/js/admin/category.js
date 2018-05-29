$(function () {
    //add new category
    $(document).on('click', '#btn_add_category',function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'http://xeroshoes.shop/admin/category',
            data: {
                name: $('#name').val()
            },
            success: function (response) {
                $('#add-cate').modal('hide');

                toastr.success('Add category successfully');

                // append
                $('#categorys').prepend('<tr class ="tr'+response.id+'"><td>' + response.id + '</td><td><a href="category/' + response.slug + '">' +  response.name + '</a></td><td>' + response.created + '</td><td> ' + response.updated + ' </td><td><a href="/admin/category/' + response.slug + '" class="btn btn-xs btn-info">show</a>&nbsp;<button class="btn btn-xs btn-warning" data-id="' + response.id + '">edit</button>&nbsp;<button class="btn btn-xs btn-danger" data-id="' + response.id + '" >delete</button></td></tr>');

            },
            error: function (xhr, status, errorThrown) {
                var err = xhr.responseJSON.errors;
                alert('a');
                console.log(err);
                $('#name-add').append('<p style="color: crimson">'+ err['name'][0] +'</p>');

            }
        })
    });
    //    end add category

    //    show modal edit
    $(document).on('click', '.btn-warning', function () {
        $('#edit').modal('show');
        var id = $(this).data('id');
        $.ajax({
            type : 'get',
            url: 'http://xeroshoes.shop/admin/category/' + id + '/edit',
            success: function (response) {
                $('#name_edit').val(response.name);
                $('.hidden-id-edit').text(id);
            }
        })
    });
//        end show modal edit
//        save update
    $('.modal-footer').on('click', '.edit-product', function(){

        var id = $('.hidden-id-edit').text();
        $.ajax({
            type: 'put',
            url: 'http://xeroshoes.shop/admin/category/' + id,
            data: {
                name: $('#name_edit').val()
            },
            success: function (response) {
                $('#edit').modal('hide');
                toastr.success('Edit category successfully');
                $('.tr'+id).replaceWith('<tr class ="tr'+response.id+'"><td>' + response.id + '</td><td><a href="category/' + response.slug + '">' +  response.name + '</a></td><td>' + response.created + '</td><td> ' + response.updated + ' </td><td><a href="/admin/category/' + response.slug + '" class="btn btn-xs btn-info" >show</a>&nbsp;<button class="btn btn-xs btn-warning" data-id="' + response.id + '">edit</button>&nbsp;<button class="btn btn-xs btn-danger" data-id="' + response.id + '" >delete</button></td></tr>');
            },
            error: function (xhr, status, errorThrown) {
                var err = xhr.responseJSON.errors;
                $('#name-edit').append('<p style="color: crimson">'+ err['name'][0] +'</p>');

            }
        });
    });
//        end save update

    //        show modal delete
    $(document).on('click', '.btn-danger', function () {
        $('#modal-del').modal('show');
        var id = $(this).data('id');
        $.ajax({
            type : 'get',
            url: 'http://xeroshoes.shop/admin/category/' + id +'/edit',
            success: function (response) {
                $('#name-delete').text(response.name);
                $('.hidden-id').text(id);
            }
        });
    });
//        end show modal delete

//        delete
    $('.modal-footer').on('click', '.delete-del', function(){
        var id = $('.hidden-id').text();
        $.ajax({
            type: 'delete',
            url: 'http://xeroshoes.shop/admin/category/' + id,
            // data: {
            //     id: id
            // },
            success: function(response) {
                $('#modal-del').modal('hide');
                console.log(response.error);
                if (response.error == true)
                    toastr.error('Please delete all products of this category before delete');
                else {toastr.success('Delete category successfully');
                    $('.tr'+id).remove();}
            }
        });

    });
//        end delete
});