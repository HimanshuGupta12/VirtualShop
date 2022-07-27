//const { functionsIn } = require("lodash");

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
                'Your file has been deleted.',
                'success'
              )
              window.location= "/admin/delete-"+module+"/"+moduleid;
            }
          });
    });
});

