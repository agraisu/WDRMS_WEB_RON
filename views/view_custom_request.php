<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once './others/other_pages/all_css.php'; ?>
    </head>
    <body class="animsition">

        <!-- Header -->
        <?php require_once './others/other_pages/nav_bar.php'; ?>

        <!-- Cart -->

        <!-- Content page -->
        <section class="bg0 p-t-104 p-b-116">
            <div class="container">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <!-- /.card -->
                        <!-- Horizontal Form -->
                        <div class="card card-info">

                            <!-- /.card-header -->
                            <!-- form start -->


                            <div class="row">
                                <div class="col-md-12">                                            
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" style="font-size: 20px;background-color: #F5F5F5" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="">
                                            <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="view_cus_req_tbl">
                                                <thead class="table-secondary">
                                                    <tr style="background-color: #E6FAF7">
                                                        <th class="text-center">From Date : </th>
                                                        <th><input type="text" id="from" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"></th>
                                                        <th class="text-center">To Date : </th>
                                                        <th><input type="text" id="to" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"></th>
                                                        <th></th>
                                                        <th><button type="button" id="cus_req_search" style="background-color: #01a0e4; width: 5cm; height: 1cm;" ><b>Search</b></button></th>

                                                    </tr>
                                                    <tr>
                                                        <th>Req no</th>
                                                        <th>NIC</th>
                                                        <th>contact</th>
                                                        <th>Photo</th>
                                                        <th>Payments</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    </section>
                    <!--=========================================================================-->        
                    <div class="modal fade" id="req_note_mdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center" style="font-size: 24px;margin-left: 153px" id="exampleModalLabel"><b>Item Preview</b></h1>
                                </div>
                                <div class="modal-body">
                                    <img id="req_img" style="width: 400px; height: 400px;margin-left: 30px">
                                    <hr>
                                    <h1 class="modal-title fs-5 text-center" style="font-size: 24px;" id="exampleModalLabel"><b>Request Note</b></h1>
                                    <p id="req_note" class="text-center"></p>
                                    <hr>
                                    <h1 class="modal-title fs-5 text-center" style="font-size: 24px;" id="exampleModalLabel"><b>Required Date</b></h1>
                                    <p id="req_date" class="text-center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close_model" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=========================================================================--> 

                    <!--=========================================================================-->        
                    <div class="modal fade" style="margin-top: 110px" id="req_pay_mdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center" style="font-size: 24px;margin-left: 153px;" id="exampleModalLabel"><b>Payment Details</b></h1>
                                </div>
                                <div class="modal-body">
                                    <p id="req_tot_pay" class="text-center"></p>
                                    <hr>
                                    <p id="req_advance_pay" class="text-center"></p><br>
                                    <p id="req_advance_date" class="text-center"></p>
                                    <hr>
                                    <p id="req_balance_pay" class="text-center"></p><br>
                                    <p id="req_comp_date" class="text-center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close_pay_model" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=========================================================================--> 
                </div>
            </div>
        </section>	

        <!-- Map -->
        <div class="map" style="margin-top: -300px">
            <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
        </div>

        <!-- Footer -->
        <?php require_once './others/other_pages/footer.php'; ?>


        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="zmdi zmdi-chevron-up"></i>
            </span>
        </div>
        <?php require_once './others/other_pages/all_js.php'; ?>
        <script type="text/javascript" src="./controllers/view_custom_request_controller.js"></script>
    </body>
</html>