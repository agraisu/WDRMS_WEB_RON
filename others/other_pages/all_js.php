<!--===============================================================================================-->	
<script src="./others/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/bootstrap/js/popper.js"></script>
<script src="./others/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function () {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="./others/vendor/daterangepicker/moment.min.js"></script>
<script src="./others/vendor/daterangepicker/daterangepicker.js"></script>
<script src="./others/date_picker/js/bootstrap-datepicker.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/slick/slick.min.js"></script>
<script src="./others/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="./others/alertify/alertify.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function () { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="./others/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="./others/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function (e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function () {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });

</script>
<!--===============================================================================================-->
<script src="./others/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function () {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function () {
            ps.update();
        })
    });


    function send_sms(to, msg) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "http://www.textit.biz/sendmsg/?id=94769778780&pw=5960&to=" + to + "&text=" + msg);
        xhr.send();
    }
</script>

<!--===============================================================================================-->
<script src="./others/js/main.js"></script>