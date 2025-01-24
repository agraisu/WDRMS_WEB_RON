$('#edit_prof').click(function () {
    set_profile_edit();
});

$('#reset').click(function () {
    reset_profile();
});

$('#update').click(function () {
    update_profile();
});

function set_profile_edit() {
    $('#name_cus').addClass('d-none');
    $('#name_c').removeClass('d-none');
    $('#email_cus').addClass('d-none');
    $('#email_c').removeClass('d-none');
    $('#address_cus').addClass('d-none');
    $('#address_c').removeClass('d-none');
    $('#update').removeClass('d-none');
    $('#reset').removeClass('d-none');
}

function reset_profile() {
    $('#name_cus').removeClass('d-none');
    $('#name_c').addClass('d-none');
    $('#email_cus').removeClass('d-none');
    $('#email_c').addClass('d-none');
    $('#address_cus').removeClass('d-none');
    $('#address_c').addClass('d-none');
    $('#update').addClass('d-none');
    $('#reset').addClass('d-none');
}

function update_profile(){
    var customer_name = $('#name_c').val();
    var customer_email = $('#email_c').val();
    var customer_address = $('#address_c').val();
    var dataArray = {action: "update_profile", customer_name: customer_name, customer_email: customer_email, customer_address: customer_address}
    
    $.post("./models/customer_profile_model.php", dataArray, function (reply) {
        if (reply == 1) {
            window.location='./?location=cus_profile';
//            alertify.success('Your Profile Updated Successfully');
//            setTimeout(function(){
//                window.location='./?location=cus_profile';
//            }, 2000);
        } else {
            alertify.error('Update Failed');
        }
    });
}

