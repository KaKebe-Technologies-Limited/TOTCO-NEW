<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->
<!-- sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- end sidebar -->

<!-- Body -->
<div class="container-md">

<div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="card border-0">
                        <div class="card-body p-0 auth-header-box">
                            <div class="text-center py-3">
                                <a href="/" class="logo logo-admin">
                                    <img src="assets/img/logo_final.jpg" style="max-height:40px;" alt="logo" class="auth-logo">
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <img src="assets/img/404.jpg" alt="" class="d-block mx-auto mt-4 w-100" height="250">
                            <div class="text-center auth-logo-text mb-4">
                                <h4 class="mt-0 mb-3 mt-5">Looks like you got lost...</h4>
                            </div> <!--end auth-logo-text-->
                        </div><!--end /div-->

                    </div>
                </div>
            </div>
        </div><!--end auth-page-->
    </div><!--end col-->
</div><!--end row-->
    </div>
<!-- end body -->
<!-- footer -->
<?php
include ('includes/footer.inc.php');
?>
<!-- end footer -->