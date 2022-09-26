<!-- session -->
<?php include ('controllers/load_user.php'); ?>

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
              <h6 class="">Agent</h6>
              <p class="font-12 text-aqua">Overview of an agent</p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row d-flex">
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
            <div class="col">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                     <div class="row">
                        <div class="card-content d-flex">
                          <div class="profile-image d-flex px-1 me-4">
                            <img style="height: 80px; width: 80px" src="./assets/img/63475.jpg" class="card-img-top rounded-circle">
                          </div>
                          <div class="bio d-flex flex-column">
                            <h4>Oluk Mark</h4>
                            <a href="http://">holmark5@gmail.com</a>
                            <a class="text-muted" href="tel: +256771404884">O771404884</a>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Sales Orders</h4>
                  <div class="card-header-form">
                    <a href="agent_sales_orders" class="btn btn-outline-primary">Sell All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th class="text-center">
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                              class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>Order #</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                              id="checkbox-1">
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>T001</td>
                        <td class="text-truncate">
                            Maize
                        </td>
                        <td class="align-middle">
                            1 Tonne
                        </td>
                        <td>2018-01-20</td>
                        <td>
                          <div class="badge badge-success">PAID</div>
                        </td>
                        <td>
                        <div class="d-flex flex-row">
                            <div class="p-2 mx-1 bg-secondary"><a href><span><i class="fas fa-eye text-white"></i></span></a></div>
                        </div</td>
                      </tr>

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Transactions</h4>
                  <div class="card-header-form">
                    <a href="sales-orders" class="btn btn-outline-primary btn-sm">See All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Date</th>
                        <th>Transaction</th>
                        <th>Name</th>
                      </tr>
                      <tr>
                        <td>28 Aug 2022</td>
                        <td class="text-truncate">
                            Sales order of maize
                        </td>
                        <td class="align-middle">
                            Oluk Mark
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
                <a href="#" class="btn btn-icon icon-left bg-dark-chessnut btn-restore-theme">
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
