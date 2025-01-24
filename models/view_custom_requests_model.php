<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_custom_requests_to_table") {
        $q_data = "";
        if ($_POST['type'] == 0) {
            $q_data = " ORDER BY
                  custom_request_details.cus_req_id DESC";
        } else {
            $q_data = " AND
                  DATE_FORMAT(custom_request_details.cus_req_added_date,'%Y-%m-%d') BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}'
                  ORDER BY
                  custom_request_details.cus_req_id DESC";
        }
        $query = "SELECT
                  custom_request_details.cus_req_id,
                  custom_request_details.cus_req_no,
                  custom_request_details.cus_req_nic,
                  custom_request_details.cus_phone,
                  custom_request_details.cus_req_note,
                  custom_request_details.cus_req_photo,
                  custom_request_details.cus_req_required_date,
                  custom_request_details.cus_req_status,
                  customer_details.cus_name,
                  customer_request_payment_details.cus_req_total,
                  customer_request_payment_details.cus_req_advance,
                  customer_request_payment_details.cus_req_balance,
                  customer_request_payment_details.cus_req_added_date_time,
                  IFNULL(customer_request_payment_details.cus_req_issued_date, ' - ') AS cus_req_issued_date
                  FROM
                  custom_request_details
                  INNER JOIN customer_details ON custom_request_details.cus_req_nic = customer_details.cus_nic
                  INNER JOIN customer_request_payment_details ON custom_request_details.cus_req_no = customer_request_payment_details.cus_req_no
                  WHERE
                  customer_details.cus_nic = '{$_SESSION['cus_nic']}' AND
                  (custom_request_details.cus_req_no LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_req_nic LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_phone LIKE '{$_POST['search']}%' OR
                  customer_details.cus_name LIKE '{$_POST['search']}%')" . $q_data;
        $result = $app->json_encoded_select_query($query);
    }
}