<!-- session -->
<?php include ('includes/load_user.inc.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<!-- MAIN -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="page-title col-12 mb-2">
            <h6 class="">New User Approval Dashboard</h6>
            <p class="font-12 text-aqua"></p>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="#pending-users">
                <div class="card bg-blue-grey">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                          <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content">
                              <h5 class="font-12 text-white">Pending</h5>
                              <h2 class="mb-3 font-20 text-white">5</h2>
                              </div>
                          </div>
                          </div>
                      </div>
                    </div>
                </div>
              </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="#approved-users">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-12 text-aqua">Approved</h5>
                            <h2 class="mb-3 font-20">100</h2>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <!--<div class="banner-img">
                            <img src="assets/fonts/icons/icons8-calendar-80.png" alt="">
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="#rejected-users">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-12 text-aqua">Rejected</h5>
                            <h2 class="mb-3 font-20">0</h2>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <!--<div class="banner-img">
                          <img src="assets/img/63475.jpg">
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        </div>
</section>
<section class="section">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Pending Users</h4>
        </div>
        <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th>Username</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>E-mail address</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>markoluk</td>
              <td class="text-truncate">
                Oluk
              </td>
              <td class="text-truncate">
                Mark
              </td>
              <td class="text-truncate">
                holmark5@gmail.com
              </td>
              <td>
                <div class="d-flex flex-row">
                    <button type="button" class="btn btn-primary mx-1">Approve</button>
                    <button type="button" class="btn btn-danger mx-1">Reject</button>
                </div
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
</section>


<!-- footer -->
<?php include 'includes/footer.inc.php'; ?>
    </div>
  </div>
  <!-- scripts -->
  <?php include ('includes/scripts.inc.php'); ?>
  <!-- end scripts -->
