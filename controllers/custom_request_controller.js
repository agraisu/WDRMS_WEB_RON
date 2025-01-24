get_custom_request_no();
$('#view_requests').removeClass('d-none');

$('#save_cus').click(function () {
    upload_img();
});

$('#reset_cus').click(function () {
    clear_custom_requests();
});
//==============================================================================

function get_custom_request_no() {
    var dataArray = {action: "get_custom_request_no"}
    $.post("./models/custom_request_model.php", dataArray, function (reply) {
        $('#cus_req_no').val(reply);
    });
}

function clear_custom_requests() {
    var cus_req_note = $('#cus_req_note').val('');
    $('#photo_file').val('');
    $("#photo").attr('src', '');
}

function form_validate() {
    var error = 0;

    var cus_req_note = $('#cus_req_note').val();
    var required_date = $('#required_date').val();

    if (cus_req_note.length == 0) {
        $('#cus_req_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_req_msg').addClass('d-none');
    }
    
    if (required_date.length == 0) {
        $('#req_date_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#req_date_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

$('#photo_file').change(function (event) {
    //get the path of the selected image
    var tmppath = URL.createObjectURL(event.target.files[0]);
    //set the path to the src attribute
    $("#photo").attr('src', tmppath);
    //get the uploaded image name with the extension
    var img_name = event.target.files[0].name;
    //split the name
    var x = img_name.split('.');
    if (x[1] == "jpg" || x[1] == "jpeg" || x[1] == "png") {
        //concat . & image extension to item code 
        var new_name = $('#cus_req_no').val() + '.' + x[1];
        localStorage.setItem('new_name', new_name);
        $('#photo_msg').addClass('d-none');
        $('#save_cus').prop('disabled', false);
    } else {
        $('#photo_msg').removeClass('d-none');
        $('#save_cus').prop('disabled', true);
    }
});

//move the image to its distination
function upload_img() {
    if (document.getElementById("photo_file").files.length == 0) {
        $('#photo_check').removeClass('d-none');
    } else {
        $('#photo_check').addClass('d-none');
        //create a inbuilt object 
        var fd = new FormData();
        //assign the image details(name, extension, size..) to a variable
        var files = $('#photo_file')[0].files[0];
        //append the uploaded image details to the object fd 
        fd.append('file', files);
        $.ajax({
            url: './models/photo_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    save_custom_request();
                } else {
                    alertify.error('Image not uploaded');
                }
            },
        });
    }
}

function save_custom_request() {
    var cus_req_no = $('#cus_req_no').val();
    var cus_nic = $('#cus_nic').val();
    var cus_phone = $('#cus_phone').val();
    var cus_req_note = $('#cus_req_note').val();
    //to make uploaded image name = saved database image
    var item_photo = localStorage.getItem('new_name');
    var required_date = $('#required_date').val();

    var dataArray = {action: "save_custom_request", cus_req_no: cus_req_no, cus_nic: cus_nic, cus_phone: cus_phone, cus_req_note: cus_req_note, item_photo: item_photo, required_date: required_date}

    if (form_validate()) {
        $.post("./models/custom_request_model.php", dataArray, function (reply) {
            if (reply == 1) {
//            alert('Insert Query Ok');
                alertify.success('Request sent Successfully');
                get_custom_request_no();
                clear_custom_requests();
            } else {
//            alert('Insert Query not Ok');
                alertify.error('Request sending Failed');
            }
        });
    }
}