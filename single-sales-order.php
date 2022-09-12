<!-- session -->
<?php include ('includes/load_user.inc.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->



 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="page-title col-12 mb-2">
              <h6 class="">Single Sales Order</h6>
              <p class="font-12 text-aqua">A single sales order overview</p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-aqua">Order #</h5>
                          <h2 class="mb-3 font-18">T001</h2>
                          <div class="badge badge-success">CONFIRMED</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-aqua">Order Date</h5>
                          <h2 class="mb-3 font-18">28 Aug 2022</h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/fonts/icons/icons8-calendar-80.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="single-agent.php">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-12 text-aqua">Agent Name</h5>
                            <p class="font-15 mb-0">Oluk Mark</p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                          <img src="assets/img/63475.jpg">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Proforma Invoice</h4>
                  <div class="card-header-form">

                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                    <div class="">
                      <h2 class="font-15">Oluk Mark</h5>
                      <h5 class="font-12 text-aqua">0771404884</h5>
                    </div>
                    <div class="">
                      <h5 class="font-12 text-aqua">Odokomit, Lira City</h5>
                    </div>
                  </div>
                  <div class="bg-primary rounded p-4 d-flex justify-content-between mb-4">
                    <div>
                      <h5 class="font-12 text-white">Invoice Number</h5>
                      <p class="font-12 text-white m-0 p-0">INV-2022-010</p>
                      <p class="font-12 text-white m-0 p-0">Issued Date: 28 Aug 2022</p>
                      <p class="font-12 text-white m-0 p-0">Due Date: 28 Sept 2022</p>
                    </div>
                    <div>
                      <h5 class="font-12 text-white">Billed to</h5>
                      <p class="font-12 text-white">TOTCO Uganda LTD</p>
                    </div>
                  </div>
                  <div class="row py-4">
                    <h5 class="font-15">Order Detail</h5>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price/kg</th>
                      </tr>
                      <tr>
                        <td>Maize</td>
                        <td class="text-truncate">
                            1 Tonne
                        </td>
                        <td class="align-middle">
                            3500
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </section>




        <!-- Setting Sidebar -->
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- footer -->
<?php include 'includes/footer.inc.php'; ?>
    </div>
  </div>
  <!-- scripts -->
  <?php include ('includes/scripts.inc.php'); ?>
  <!-- end scripts -->