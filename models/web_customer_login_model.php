<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//===========================================================================
//user login
if (isset($_POST['action'])) {
    if ($_POST['action'] == "login_to_system") {
        $username = $_POST['username'];
        $password = $app->password_encript($_POST['password']);
        //query to extract user details from db
        $query = "SELECT
                  customer_details.cus_id,
                  customer_details.cus_regi_no,
                  customer_details.cus_name,
                  customer_details.cus_nic,
                  customer_details.cus_email,
                  customer_details.cus_contact,
                  customer_details.cus_address,
                  customer_details.cus_status
                  FROM `customer_details`
                  WHERE
                  customer_details.cus_nic = '{$username}' AND
                  customer_details.cus_login_code = '{$password}'";
        $user_count = $app->row_count_quary($query);
        //if user exist get data of user
        if ($user_count == 1) {
            $user_data = $app->basic_Select_Query($query);
            if ($user_data[0]['cus_status'] == 0) {
                echo 99;
            } elseif ($user_data[0]['cus_status'] == 2) {
                echo 100;
            } else {
                //to keep values temporaly when we log
                //a session can access in anywhere inside system unlike variable which is only accessible in relavent page
                $_SESSION['cus_id'] = $user_data[0]['cus_id'];
                $_SESSION['cus_regi_no'] = $user_data[0]['cus_regi_no'];
                $_SESSION['cus_name'] = $user_data[0]['cus_name'];
                $_SESSION['cus_nic'] = $user_data[0]['cus_nic'];
                $_SESSION['cus_email'] = $user_data[0]['cus_email'];
                $_SESSION['cus_contact'] = $user_data[0]['cus_contact'];
                $_SESSION['cus_address'] = $user_data[0]['cus_address'];
                echo 1;
            }
        } else {
            echo 0;
        }
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "log_out") {
        unset($_SESSION['cus_id']);
        unset($_SESSION['cus_regi_no']);
        unset($_SESSION['cus_name']);
        unset($_SESSION['cus_nic']);
        unset($_SESSION['cus_email']);
        unset($_SESSION['cus_contact']);
        unset($_SESSION['cus_address']);
        header("Location: http://localhost/wdrms_web/?location=home");
    }
}


