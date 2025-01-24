<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "update_profile") {
        $query = "UPDATE `customer_details` SET "
                . "`cus_name` = '{$_POST['customer_name']}', "
                . "`cus_email` = '{$_POST['customer_email']}', "
                . "`cus_address` = '{$_POST['customer_address']}' "
                . "WHERE "
                . "(`cus_id` = '{$_SESSION['cus_id']}');";
    $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}