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
                <div class="flex-w flex-tr">
                    <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md"style="background-image: linear-gradient(rgba(31,30,30,0.68), rgba(0, 0, 0, 0.68)),url('others/images/cpl.jpg');background-repeat: no-repeat;background-size: 700px 800px;">
                        <h4 class="mtext-105 cl2 text-white txt-center p-b-30" style="margin-top: 200px;margin-bottom: 20px;">
                            <span style="background-color: #555555">Login</span>
                        </h4>
                        <!--                        <div class="login-logo">
                                                        <a href="../../index2.html"><b><span style="color: #3B3B39;font-family: chela one;font-size: 30px"><b>RON Renters & Tailors</b></span></b></a>
                                                    <img src="others/images/logpic.webp" alt="" class="img-circle" style="height: 390px;width: 530px;margin-top: 10px;margin-bottom: 10px">
                                                </div>-->

                        <div class="bor8 m-b-20 how-pos4-parent" style="margin-top: 10px">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="cus_user_name" placeholder="User Name (Your NIC Number)">
                        </div>
                        <h6 style="color: red;margin-top: -10px;margin-bottom: 8px" id="c_uname_msg" class="d-none">This field is requird.</h6>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="cus_pw" placeholder="Password">
                        </div>
                        <h6 style="color: red;margin-top: -10px;margin-bottom: 8px" id="c_pw_msg" class="d-none">This field is requird.</h6>
                        <h6 style="color: red;margin-top: -10px;margin-bottom: 8px" id="log_fail_msg" class="d-none">Invalid username or password.</h6>
                        <button type="button" style="background-color: #6C67DA" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" id="log_cus">
                            Login
                        </button>
                    </div>
                    <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                        <div class="login-logo">
<!--                                <a href="../../index2.html"><b><span style="color: #3B3B39;font-family: chela one;font-size: 30px"><b>RON Renters & Tailors</b></span></b></a>-->
                            <img src="others/images/29.PNG" alt="" class="img-circle" style="height: 200px;width: 200px;margin-top: 20px">
                        </div>
                        <div class="flex-w w-full p-b-42" style="margin-top: 60px">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-map-marker"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Our Address
                                </span>

                                <p class="stext-115 cl6 size-213 p-t-18">
                                    RON Renters and Tailors,<br>
                                    No. 176/A,<br>
                                    1<sup>st</sup> Floor,<br>
                                    Main Street,<br>
                                    Kegalle.
                                </p>
                            </div>
                        </div>

                        <div class="flex-w w-full p-b-42">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-phone-handset"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Lets Talk
                                </span>

                                <p class="stext-115 cl1 size-213 p-t-18">
                                    077-8987878
                                </p>
                            </div>
                        </div>

                        <div class="flex-w w-full">
                            <span class="fs-18 cl5 txt-center size-211">
                                <span class="lnr lnr-envelope"></span>
                            </span>

                            <div class="size-212 p-t-2">
                                <span class="mtext-110 cl2">
                                    Sale Support
                                </span>

                                <p class="stext-115 cl1 size-213 p-t-18">
                                    ron.rtkegalle@example.com
                                </p>
                            </div>
                        </div>
                    </div>
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
        <script type="text/javascript" src="./controllers/web_customer_login_controller.js"></script>
    </body>
</html>