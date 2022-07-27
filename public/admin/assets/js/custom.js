//const { functionsIn } = require("lodash");

//const { get } = require("lodash");

$(document).ready(function () {
    //check Admin Password is correct or not
    $('#current_password').keyup(function () {
        var current_password = $('#current_password').val();
        //  alert(current_password);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'post',
            url: '/admin/check-admin-password',
            data: { current_password: current_password },
            success: function (response) {
                // alert(response)
                if (response == "false") {
                    $("#check_password").html("<font color = 'red'>Current Password if incorrect ! </font>");
                }
                else if (response == "true") {
                    $("#check_password").html("<font color = 'green'>Current Password if correct . </font>");
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });


    //update admin status

    $(document).on("click", ".updateAdminStatus", function () {
        //alert("test");
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        //alert(admin_id);

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-admin-status',
            data: {
                status: status,
                admin_id: admin_id
            },
            success: function (response) {
                //alert(response);
                if (response['status'] == 0) {
                    $('#admin-' + admin_id).html('<i style="font-size: 30px; color:red;" class="bx bxs-user-x" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#admin-' + admin_id).html(' <i style ="font-size: 30px; color:green;" class="bx bxs-user-check" status = "Active"></i>');
                }

            },
            error: function () {
                alert('Error');
            }
        });


    });


    //update Section status

    $(document).on("click", ".updateSectionStatus", function () {
        //alert("test");
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        //alert(section_id);

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-section-status',
            data: {
                status: status,
                section_id: section_id
            },
            success: function (response) {
                //alert(response);
                if (response['status'] == 0) {
                    $('#section-' + section_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#section-' + section_id).html(' <i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }

            },
            error: function () {
                alert('Error');
            }
        });


    });

    //confirm delete section (simple javascript)
    // $('.confirmDelete').click(function(){
    //     var title = $(this).attr("title");
    //     if(confirm("Are you sure to delete" +title+"?"))
    //     {
    //         //delete the section
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // });


    //confirm delete section (sweet Alert Library)
    $('.confirmDelete').click(function () {
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',

                'success'
              )
              window.location= "/admin/delete-"+module+"/"+moduleid;
            }
          });
    });



     //update Category  status

    $(document).on("click", ".updateCategoryStatus", function () {
        //alert("test");
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        //alert(category_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: {
                status: status,
                category_id: category_id
            },
            success: function (response) {
                //alert(response);
                if (response['status'] == 0) {
                    $('#category-' + category_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#category-' + category_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

    //Append Categories level
    $("#section_id").change(function(){
        var section_id = $(this).val();
        // alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'get',
            url : '/admin/append-categories-level',
            data:{
                section_id:section_id
            },
            success:function(resp)
            {
                $("#appendCategoriesLevel").html(resp);
            },
            error:function()
            {
                alert("Error");
            }
        });

    });

    //update Brand status

    $(document).on("click", ".updateBrandStatus", function () {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-brand-status',
            data: {
                status: status,
                brand_id: brand_id
            },
            success: function (response) {
                if (response['status'] == 0) {
                    $('#brand-' + brand_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#brand-' + brand_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });

     //update Product status

    $(document).on("click", ".updateProductStatus", function () {
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr("product_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-product-status',
            data: {
                status: status,
                product_id: product_id
            },
            success: function (response) {
                if (response['status'] == 0) {
                    $('#product-' + product_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#product-' + product_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

    //Product Attributes Add / Remove input Fields Script

        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div> <input type="text" name="size[]" class="form-control"  placeholder="Enter Size" width="120px;"/>&nbsp;  <input type="text" name="sku[]"  class="form-control"  placeholder="Enter SKU" width="120px;"/> &nbsp;  <input type="number" name="original_price[]" class="form-control"  placeholder="Enter Original  Price" width="120px;" /> &nbsp;  <input type="number" name="stock[]"  class="form-control"  placeholder="Enter Stock" width="120px;" /> <a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });


        //update Attribute status

    $(document).on("click", ".updateAttributeStatus", function () {
        var status = $(this).children("i").attr("status");
        var attribute_id = $(this).attr("attribute_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-attribute-status',
            data: {
                status: status,
                attribute_id: attribute_id
            },
            success: function (response) {
                if (response['status'] == 0) {
                    $('#attribute-' + attribute_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#attribute-' + attribute_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });


    //update Image status

    $(document).on("click", ".updateImageStatus", function () {
        var status = $(this).children("i").attr("status");
        var image_id = $(this).attr("image_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-image-status',
            data: {
                status: status,
                image_id: image_id
            },
            success: function (response) {
                if (response['status'] == 0) {
                    $('#image-' + image_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#image-' + image_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

    //update Banner status

    $(document).on("click", ".updateBannerStatus", function () {
        //alert("test");
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        //alert(banner_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-banner-status',
            data: {
                status: status,
                banner_id: banner_id
            },
            success: function (response) {
                //alert(response);
                if (response['status'] == 0) {
                    $('#banner-' + banner_id).html('<i style="font-size: 20px; color:red;" class="bx bx-toggle-left text-danger" status = "Inactive"></i>');
                }
                else if (response['status'] == 1) {
                    $('#banner-' + banner_id).html('<i style ="font-size: 20px; color:green;" class="bx bx-toggle-right text-info" status = "Active"></i>');
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

});

