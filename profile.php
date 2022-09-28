<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<!-- MAIN CONTENT -->
<main class="main-content pt-5 mt-3">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12 my-5">
                <div class="page-title-box">
                    <h4 class="page-title font-20">My profile</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="card mb-4 p-3">
            <div class="met-profile">
                <div class="row">
                    <div class="col-lg-5 align-self-center mb-3 mb-lg-0 border-end">
                        <div class="met-profile-main">
                            <div class="met-profile-main-pic">
                                <img src="assets/img/63475.jpg" alt="" height="110" class="rounded-circle">
                                <span class="met-profile_main-pic-change">
                                    <i class="fas fa-camera"></i>
                                </span>
                            </div>
                            <div class="met-profile_user-detail">
                                <h5 class="met-user-name"><span id="user_name" data-bs-toggle="popover" data-bs-title="" class="dark-editable-element">Oluk Mark</span></h5>
                                <p class="mb-0 met-user-name-post">Administrator</p>
                            </div>
                            <script>
                                const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
                                const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
                            </script>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-7 ml-auto">
                        <ul class="list-unstyled personal-detail">
                            <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : +256771404884</li>
                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : holmark5@gmail.com</li>
                            <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Location </b> : Lira</li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end f_profile-->
        </div>

        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title font-14">Change your email</h4>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form name="emailForm">
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label">Old email address</label>
                                <div class="col-lg-12 col-xl-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Old Email" id="oldEmailAddress" name="oldEmailAddress" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label">New email address</label>
                                <div class="col-lg-12 col-xl-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="New Email" id="newEmailAddress" name="newEmailAddress" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-lg-9 col-xl-8">
                                    <button type="button" id="changeEmailBtn" class="btn btn-outline-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title font-14">Change your phone number</h4>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form name="phoneNumberForm">
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label" for="oldNumber">Current phone number</label>
                                <div class="col-lg-12 col-xl-10">
                                    <input type="tel" class="form-control phonenumber" id="oldNumber" name="oldNumber" autocomplete="off" data-intl-tel-input-id="0" style="padding-left: 88px;">
                                </div>
                            </div>
                            <script>
                            var input = document.querySelector("#oldNumber");
                            window.intlTelInput(input, {
                                initialCountry: "auto",
                                geoIpLookup: function(success, failure) {
                                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                                    var countryCode = (resp && resp.country) ? resp.country : "ug";
                                    success(countryCode);
                                    });
                                },
                            });
                            </script>
                            <div class="form-group input-group-sm mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label" for="newNumber">New phone number</label>
                                <div class="col-lg-12 col-xl-10">
                                <input type="tel" class="form-control phonenumber" id="newNumber" name="newNumber" autocomplete="off" data-intl-tel-input-id="0" style="padding-left: 88px;">
                                </div>
                            </div>
                            <script>
                            var input = document.querySelector("#newNumber");
                            window.intlTelInput(input, {
                                initialCountry: "auto",
                                geoIpLookup: function(success, failure) {
                                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                                    var countryCode = (resp && resp.country) ? resp.country : "ug";
                                    success(countryCode);
                                    });
                                },
                            });
                            </script>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-9 col-xl-8">
                                    <button type="button" id="changeNumberBtn" class="btn btn-outline-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!--end col-->
            <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title font-14">Theme Preferences</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form name="them_form">
                            <div class="row mb-3">
                                <label class="col-md-3 my-1 control-label">Select a Theme</label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="theme" id="light_theme" value="light_theme" checked="checked">
                                        <label class="form-check-label label-link" for="light_theme">Light</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="theme" id="dark_theme" value="dark_theme">
                                        <label class="form-check-label label-link" for="dark_theme">Dark</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="theme" id="system_theme" value="system_theme">
                                        <label class="form-check-label label-link" for="system_theme">Use System's</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title font-14">Change Password</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form class="" name="passFrom">
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label">Current password</label>
                                <div class="col-lg-12 col-xl-10">
                                    <input class="form-control" type="password" placeholder="Current password" id="oldPassword" name="oldPassword">
                                    <a href="#" class="text-primary font-12">Forgot password ?</a>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label">New password</label>
                                <div class="col-lg-12 col-xl-10">
                                    <input class="form-control" type="password" placeholder="New Password" id="newPassword" name="newPassword">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="mb-lg-2 align-self-center form-label">Confirm password</label>
                                <div class="col-lg-12 col-xl-10">
                                    <input class="form-control" type="password" placeholder="Re-Password" id="confirmPassword" name="ConfirmPassword">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-9 col-xl-8">
                                    <button type="submit" class="btn btn-outline-primary" id="changePasswordBtn">Change Password</button>
                                    <button type="reset" class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-->

            </div> <!-- end col -->
        </div>


        <div class="modal fade" id="otp_modal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal my-4">
                            <div class="user-thumb text-center m-b-30">
                                <div class="avatar-box thumb-xl align-self-center mr-2">
                                    <span class="avatar-title bg-warning rounded-circle"><i class="fas fa-lock"></i></span>
                                </div>
                                <h5 id="otp_message">We sent an OTP code to </h5>
                            </div>
                            <div class="form-group text-center">
                                <label for="userpassword">Code</label>

                                <div class="pincode-input-container"><div style="display: none;"><input type="number" pattern="[0-9]*" inputmode="numeric" id="preventautofill" autocomplete="off" class="pincode-input-text-masked"></div><input type="text" maxlength="1" autocomplete="off" class="form-control pincode-input-text pincode-input-text-masked first" style="width: 25%;"><input type="text" maxlength="1" autocomplete="off" class="form-control pincode-input-text pincode-input-text-masked mid" style="width: 25%;"><input type="text" maxlength="1" autocomplete="off" class="form-control pincode-input-text pincode-input-text-masked mid" style="width: 25%;"><input type="text" maxlength="1" autocomplete="off" class="form-control pincode-input-text pincode-input-text-masked last" style="width: 25%;"></div><div class="text-danger pincode-input-error"></div><input type="text" id="otp_input" style="width: 100%; display: none;">
                            </div><!--end form-group-->

                            <div class="form-group mb-0 row">
                                <div class="offset-md-3 col-md-6 mt-2">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-round btn-block" id="verifyBtn" type="button">Verify <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>

                                </div><!--end col-->
                            </div> <!--end form-group-->

                            <p class="text-muted mt-3 text-center font-18">If no OTP in <span id="timer">!:00</span> <button type="button" id="re_send_otp" class="btn btn-link" disabled="">Re Send Code</button></p>

                        </form><!--end form-->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</main>
<!-- Popovers -->
<div class="popover dark-editable fade hide bs-popover-end" role="tooltip" id="popover132701" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(545px, 161px);" data-popper-placement="right">
    <div class="popover-arrow" style="position: absolute; top: 0px; transform: translate(0px, 25px);"></div>
    <div class="popover-body">
        <form class="d-flex align-items-start" style="gap: 20px;">
            <input class="form-control" type="text">
                <div style="display: none; position: absolute; background: white; width: 100%; height: 100%; top: 0px; left: 0px;">
                    <div class="dark-editable-loader">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success" style="color: transparent; text-shadow: white 0px 0px 0px;">✔</button>
                <button type="button" class="btn btn-sm btn-danger" style="color: transparent; text-shadow: white 0px 0px 0px;">
                    <div style="transform: rotate(90deg);">✖</div>
                </button>
        </form>
    </div>
</div>
<!--/MAIN CONTENT-->
<!-- footer -->
<?php include './includes/footer.inc.php'; ?>
<!--/footer-->