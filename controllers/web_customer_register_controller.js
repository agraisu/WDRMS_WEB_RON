get_customer_code();
$('#save_cus').click(function () {
    send_otp();
});

$('#reset_cus').click(function () {
    clear_customers();
});

$('#conf_otp').click(function () {
    conf_otp();
});

$('#cus_name').keyup(function () {
    validate_cus_name();
});

$('#cus_nic').keyup(function () {
    check_cus_nic();
});

$('#cus_email').keyup(function () {
    check_cus_email();
});

$('#cus_contact').keyup(function () {
    var cus_contact = $('#cus_contact').val();
    if (isNaN(cus_contact) || cus_contact.length != 10) {
        $('#cus_contact_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    } else {
        $('#cus_contact_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
        check_cus_contact();
    }
});

//==============================================================================
function myFunction() {
    var x = document.getElementById("cus_log_code");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function get_customer_regi_no() {
    var dataArray = {action: "get_customer_regi_no"}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        $('#cus_regi_no').val(reply);
    });
}

function form_validate() {
    var error = 0;

    var cus_name = $('#cus_name').val();
    var cus_gender = $('#cus_gender').val();
    var cus_nic = $('#cus_nic').val();
    var cus_email = $('#cus_email').val();
    var cus_contact = $('#cus_contact').val();
    var cus_address = $('#cus_address').val();
    var cus_log_code = $('#cus_log_code').val();

    if (cus_name.length == 0) {
        $('#c_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_name_msg').addClass('d-none');
    }

    if (cus_gender.length == 0) {
        $('#c_gender_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_gender_msg').addClass('d-none');
    }

    if (cus_nic.length == 0) {
        $('#c_nic_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_nic_msg').addClass('d-none');
    }

    if (cus_email.length == 0) {
        $('#c_email_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_email_msg').addClass('d-none');
    }

    if (cus_contact.length == 0) {
        $('#c_contact_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_contact_msg').addClass('d-none');
    }

    if (cus_address.length == 0) {
        $('#c_address_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#c_address_msg').addClass('d-none');
    }

    if (cus_log_code.length == 0) {
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

//nic validation
function validate_cus_nic() {
    var cus_nic = $('#cus_nic').val();
    //Old NIC regular expression
    var old_cus_nic = new RegExp('^[0-9+]{9}[vV|xX]$');
    //NEW NIC regular expression
    var new_cus_nic = new RegExp('^[0-9+]{12}$');
    if (cus_nic.length == 10 && old_cus_nic.test(cus_nic)) {
        $('#c_nic_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else if (cus_nic.length == 12 && new_cus_nic.test(cus_nic)) {
        $('#c_nic_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else {
        $('#c_nic_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    }
}

function validate_cus_name() {
    var cus_name = $('#cus_name').val();
    var old_cus_name = new RegExp('^([A-Z][a-z]+|[A-Z][a-z]+\\s{1}[A-Z][a-z]{1,}|[A-Z][a-z]+\\s{1}[A-Z][a-z]{3,}\\s{1}[A-Z][a-z]{1,})$');
    if (old_cus_name.test(cus_name)) {
        $('#c_name_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else {
        $('#c_name_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    }
}

function validate_cus_email() {
    var cus_email = $('#cus_email').val();
    var old_cus_email = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$');
    if (old_cus_email.test(cus_email)) {
        $('#c_email_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else {
        $('#c_email_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    }
}

$('#cus_contact').keyup(function () {
    var cus_contact = $('#cus_contact').val();
    if (isNaN(cus_contact) || cus_contact.length != 10) {
        $('#c_contact_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    } else {
        $('#c_contact_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
        check_cus_contact();
    }
});

function check_cus_nic() {
    var cus_nic = $('#cus_nic').val();
    var dataArray = {action: "check_cus_nic", cus_nic: cus_nic}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#c_nic_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#c_nic_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
            validate_cus_nic();
        }
    });
}

function check_cus_email() {
    var cus_email = $('#cus_email').val();
    var dataArray = {action: "check_cus_email", cus_email: cus_email}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#c_email_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#c_email_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
            validate_cus_email();
        }
    });
}

function check_cus_contact() {
    var cus_contact = $('#cus_contact').val();
    var dataArray = {action: "check_cus_contact", cus_contact: cus_contact}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#c_contact_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#c_contact_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
        }
    });
}


function clear_customers() {
    $('#cus_regi_no').val('');
    $('#cus_name').val('');
    $('#cus_gender').val('');
    $('#cus_nic').val('');
    $('#cus_email').val('');
    $('#cus_contact').val('');
    $('#cus_address').val('');
    $('#button_section').removeClass('d-none');
    $('#otp_section').addClass('d-none');
}

function get_customer_to_save() {
    var cus_regi_no = $('#cus_regi_no').val();
    var cus_name = $('#cus_name').val();
    var cus_gender = $('#cus_gender').val();
    var cus_nic = $('#cus_nic').val();
    var cus_email = $('#cus_email').val();
    var cus_contact = $('#cus_contact').val();
    var cus_address = $('#cus_address').val();
    var cus_log_code = $('#cus_log_code').val();
    var dataArray = {action: "get_customer_to_save", cus_regi_no: cus_regi_no, cus_name: cus_name, cus_gender: cus_gender, cus_nic: cus_nic, cus_email: cus_email, cus_contact: cus_contact, cus_address: cus_address, cus_log_code: cus_log_code}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Customer Added Successfully');
            clear_customers();
            get_customer_code();
        } else {
            alertify.error('Customer Added Failed');
        }
    });
}

function get_customer_code() {
    var dataArray = {action: "get_customer_code"}
    $.post("./models/web_customer_register_model.php", dataArray, function (reply) {
        $('#cus_regi_no').val(reply);
    });
}

function send_otp() {
    if (form_validate()) {
        var minm = 100000;
        var maxm = 999999;
        var output = Math.floor(Math.random() * (maxm - minm + 1)) + minm;
        localStorage.setItem('otp', output);
        var text_msg = "OTP : " + output + " Please enter this OTP code to complete your registration. (RON Renters & Tailors)";
//--------------------------------------------------------------------------
        var cus_contact = $('#cus_contact').val();
        if (cus_contact.length == 0 || cus_contact.length != 10) {
            alertify.error('Pleasr enter a valid contact number.');
        } else {
            //uncomment to send otp
//            send_sms(cus_contact, text_msg);
            $('#button_section').addClass('d-none');
            $('#otp_section').removeClass('d-none');
        }
    }
}

function conf_otp() {
    var otp = $('#otp_code').val();
    var send_otp = localStorage.getItem('otp');
    if (otp == send_otp) {
        get_customer_to_save();
    } else {
        alertify.error('Invalid OTP code.');
    }
}


