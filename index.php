<?php

if (isset($_GET['location'])) {
    if ($_GET['location'] == "home") {
        require_once './views/home_page.php';
    } else if ($_GET['location'] == "web_cus_log") {
        require_once './views/web_customer_login.php';
    } else if ($_GET['location'] == "items") {
        require_once './views/item_details.php';
    } else if ($_GET['location'] == "web_cus_reg") {
        require_once './views/web_customer_registration.php';
    } else if ($_GET['location'] == "web_cus_request") {
        require_once './views/custom_request.php';
    } else if ($_GET['location'] == "cus_profile") {
        require_once './views/customer_profile.php';
    } else if ($_GET['location'] == "view_custom_requests") {
        require_once './views/view_custom_request.php';
    } else {
        require_once './views/home_page.php';
    }
} else {
    require_once './views/home_page.php';
}