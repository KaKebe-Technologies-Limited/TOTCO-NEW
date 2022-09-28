<?php include('controllers/loginAuth.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>TOTCO Inventory Management System</title>


  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/totco-favicon.gif' />
</head>

<body>
  <div class="loader"></div>
  <div class="container-md">
    <!-- Log In page -->
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
                            <div class="text-center auth-logo-text">
                                <h5 class="mb-4">Login to access your account</h5>
                            </div> <!--end auth-logo-text-->
                            <div id="msg"></div>
                            <form id="login_form" method="POST" class="needs-validation" novalidate auth-form my-4" autocomplete="off">
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="username">Username</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" tabindex="1" required autofocus>
                                </div><!--end form-group-->
                                <div class="form-group mb-4">
                                    <label class="mb-2" for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" tabindex="2" required>
                                </div><!--end form-group-->
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 text-center">
                                        Did you <a href="account/resetpassword">forget your password?</a>
                                    </div><!--end col-->
                                </div><!--end form-group-->
                                <div class="form-group row mb-4">
                                    <div class="col-12 text-center">
                                        <button id="loginBtn" type="submit" name="login_submit" class="btn btn-dark btn-round btn-block px-5" tabindex="4">
                                            Login
                                        </button>
                                    </div><!--end col-->
                                </div> <!--end form-group-->
                            </form><!--end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end auth-page-->
    </div><!--end col-->
</div><!--end row-->
<!-- End Log In page -->
</div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/account.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>