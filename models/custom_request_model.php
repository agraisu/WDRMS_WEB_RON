<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_custom_request_no") {
        $next_req_id = $app->get_next_autoincrement_ID("custom_request_details");
        echo $req_code = "CR00" . $next_req_id;
        $_SESSION['reqest_code'] = $req_code;
    } elseif ($_POST['action'] == "save_custom_request") {
        $query = "INSERT INTO `custom_request_details` ( `cus_req_no`, `cus_req_nic`, `cus_phone`, `cus_req_note`, `cus_req_photo`, `cus_req_required_date` ) "
                . "VALUES "
                . "( '{$_POST['cus_req_no']}', '{$_POST['cus_nic']}', '{$_POST['cus_phone']}', '{$_POST['cus_req_note']}', '{$_POST['item_photo']}', '{$_POST['required_date']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}