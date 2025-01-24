<?php
require_once './others/class/main_funtions.php';
$app = new setting();
$user = $_SESSION['cus_id'];

$query = "SELECT
customer_details.cus_regi_no,
customer_details.cus_name,
customer_details.cus_gender,
customer_details.cus_nic,
customer_details.cus_email,
customer_details.cus_contact,
customer_details.cus_address,
customer_details.cus_status,
customer_details.cus_regi_date
FROM `customer_details`
WHERE
customer_details.cus_id = '{$user}'";
$data = $app->basic_Select_Query($query);
?>

<?php require_once './others/other_pages/all_css.php'; ?>
<!--profile-->
<link rel="stylesheet" href="others/css/profile.css">
<!------ Include the above in your HEAD tag ---------->
<?php require_once './others/other_pages/nav_bar.php'; ?>
            <!-- /Main Sidebar Container -->
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img class="img-circle" src="./others/images/29.PNG" style="height: 155px;width: 155px" alt=""/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-head">
                    <h5>
                        <?php echo $data[0]['cus_name']; ?>
                    </h5><br>
                    <h6>
                        Register No: <?php echo $data[0]['cus_regi_no']; ?>
                    </h6><br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
<!--            <div class="col-md-2">
                <a type="button" class="profile-edit-btn" href="./?x=dashboard">Go Back</a>
            </div>-->
            <div class="col-md-2">
                <button type="button" class="profile-edit-btn" style="background-color: #EAE6E6" id="edit_prof">Edit Profile</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile-work">
                    <br>
                    <br>
                    <hr>
                    <hr>
                    <h4 style="background-color: black;color: white;border-radius: 10px">RON Rentors & Tailors</h4>
                    <hr>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $user; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p id="name_cus"><?php echo $data[0]['cus_name']; ?></p>
                                <input type="text" class="form-control d-none" id="name_c" value="<?php echo $data[0]['cus_name']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p id="email_cus"><?php echo $data[0]['cus_email']; ?></p>
                                <input type="text" class="form-control d-none" id="email_c" value="<?php echo $data[0]['cus_email']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['cus_contact']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p id="address_cus"><?php echo $data[0]['cus_address']; ?></p>
                                <input type="text" class="form-control d-none" id="address_c" value="<?php echo $data[0]['cus_address']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>NIC No.</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['cus_nic']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Registered Date</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $data[0]['cus_regi_date']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Current Status</label>
                            </div>
                            <div class="col-md-6">
                                <?php if ($data[0]['cus_status'] == 1) { ?>
                                    <h5 style="color: green">Active</h5>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-secondary d-none" id="reset">Reset</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning d-none" id="update">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>
<?php require_once './others/other_pages/all_js.php'; ?>
<script type="text/javascript" src="./controllers/customer_profile_controller.js"></script>