$('#log_cus').click(function () {
    login_to_system();
});

//==============================================================================

function form_validate() {
    var error = 0;

    var cus_user_name = $('#cus_user_name').val();
    var cus_pw = $('#cus_pw').val();

    if (cus_user_name.length == 0) {
        $('#c_uname_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_uname_msg').addClass('d-none');
    }

    if (cus_pw.length == 0) {
        $('#c_pw_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_pw_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

//pass variables to model
function login_to_system() {
    var username = $('#cus_user_name').val();
    var password = $('#cus_pw').val();

    var dataArray = {action: "login_to_system", username: username, password: password}
    if (form_validate()) {
        $.post("./models/web_customer_login_model.php", dataArray, function (reply) {
            if (reply == 1) {
//                alertify.success('Logged Successfully');
                setTimeout(function () {
                    window.location = "./?location=home";
                    $('#log_fail_msg').addClass('d-none');
                }, 5);
            } else if (reply == 99) {
                alertify.error('Login Failed, Deleted User');
            } else if (reply == 100) {
                alertify.error('Login Failed, Temporarily Deactivated User');
            } else {
//                alertify.error('Login Failed, Invalid Username or Password');
                $('#log_fail_msg').removeClass('d-none');
            }
        });
    }
}

