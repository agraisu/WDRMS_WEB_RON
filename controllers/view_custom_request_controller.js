get_custom_requests_to_table(0);
$('#view_requests').removeClass('d-none');

$('.close_model').click(function () {
    $('#req_note_mdl').modal('hide');
});

$('.close_pay_model').click(function () {
    $('#req_pay_mdl').modal('hide');
});

$('#cus_req_search').click(function () {
    get_custom_requests_to_table(1);
});
//==============================================================================
function get_custom_requests_to_table(type) {
    var tbl_data = "";
    var dataArray;
    var search = $('#cus_req_search').val();
    if (type == 1) {
        var from_date = $('#from').val();
        var to_date = $('#to').val();
        dataArray = {action: "get_custom_requests_to_table", search: search, from_date: from_date, to_date: to_date, type: type}
    } else {
        dataArray = {action: "get_custom_requests_to_table", search: search, type: type}
    }
    $.post("./models/view_custom_requests_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.cus_req_no + '</td>';
            tbl_data += '<td>' + value.cus_req_nic + '</td>';
            tbl_data += '<td>' + value.cus_phone + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-dark view" value="' + value.cus_req_photo + '~' + value.cus_req_note + '~' + value.cus_req_required_date + '">View</button></td>';
            tbl_data += '<td><button type="button" class="btn btn-dark payment float" value="' + value.cus_req_total + '~' + value.cus_req_advance + '~' + value.cus_req_balance + '~' + value.cus_req_added_date_time + '~' + value.cus_req_issued_date + '">View</button></td>';
            if (value.cus_req_status == 0) {
                tbl_data += '<td><h5 style="color: red; font-weight: bold; font-size: 16px;">Pending</h5></td>';
            }
            if (value.cus_req_status == 1) {
                tbl_data += '<td><h5 style="color: blue; font-weight: bold; font-size: 16px;">Contacted</h5></td>';
            }
            if (value.cus_req_status == 2)
                tbl_data += '<td><h5 style="color: #3ACA17; font-weight: bold; font-size: 16px;">Confirmed</h5></td>';
            if (value.cus_req_status == 3) {
                tbl_data += '<td><h5 style="color: #BABD1A; font-weight: bold; font-size: 16px;">Cancelled</h5></td>';
            }
            if (value.cus_req_status == 4) {
                tbl_data += '<td><h5 style="color: green; font-weight: bold; font-size: 16px;">Completed</h5></td>';
            }
            tbl_data += '</tr>';
        });
        $('#view_cus_req_tbl tbody').html('').append(tbl_data);

        $('.view').click(function () {
            var img = $(this).val();
            var x = img.split('~');
            $('#req_img').attr('src', '../wdrms_web/others/req_pics/' + x[0]);
            $('#req_note').html(x[1]);
            $('#req_date').html(x[2]);
            $('#req_note_mdl').modal('show');
        });

        $('.payment').click(function () {
            var pay = $(this).val();
            var x = pay.split('~');
            $('#req_tot_pay').html('Total Amount Rs. ' + x[0]);
            $('#req_advance_pay').html('Advance Amount Rs. ' + x[1]);
            $('#req_balance_pay').html('Balance Amount Rs. ' + x[2]);
            $('#req_advance_date').html('Paid Date: ' + x[3]);
            $('#req_comp_date').html('Settled Date: ' + x[4]);
            $('#req_pay_mdl').modal('show');
        });
    }, 'json');
}

