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
              <h6 class="font-20">Sales Order</h6>
              <p class="font-10 text-aqua">A single sales order overview</p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-white text-upper">Order #</h5>
                          <h2 class="text-white my-3 font-18">T001</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Order Date</h5>
                          <h2 class="text-white font-18 my-3">28 AUG 2022</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Order Status</h5>
                          <div class="badge badge-success text-white mt-3">Approved</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="single-agent">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-dark text-upper">Agent Name</h5>
                            <h1 class="font-15 text-dark mb-0">Oluk Mark</h1>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                          <img  style="height: 78px;"src="assets/img/63475.jpg">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <div class="row d-flex">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title font-12 text-upper">Sales Order</h4>
                  <div class="card-header-form">
                    <button type="button" class="btn btn-outline-primary btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"></path>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                      </svg>
                      Proforma Invoice
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="billing p-4 d-flex justify-content-between mb-4 border">
                    <div class="agent-detail">
                      <h5 class="font-14 text-dark">Oluk Mark</h5>
                      <p class="m-0 p-0">Odokomit, Lira</span></p>
                      <p class="m-0 p-0">0771404884</p>
                    </div>
                    <div class="buyer-detail">
                      <h5 class="font-14 text-dark">Billed To</h5>
                      <p class="font-12 text-dark m-0 p-0">TOTCO Uganda LTD</p>
                      <p class="font-12 text-dark m-0 p-0">Odokomit, Lira City</p>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Item Name</th>
                        <th>Quantity<span class="font-12 text-muted ms-1">(Tonnes)</span></th>
                        <th>Price<span class="font-12 text-muted ms-1">(/kg)</span></th>
                        <th>Total<span class="font-12 text-muted ms-1">(UGX)</span></th>
                      </tr>
                      <tr>
                        <td>Maize</td>
                        <td class="">
                          10000
                        </td>
                        <td class="align-middle">
                            3500<span class="font-12 ps-1 text-muted">UGX</span>
                        </td>
                        <td class="fw-bold">
                          35000000<span class="font-12 ps-1 text-muted">UGX</span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column">
              <div class="">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-12 text-upper">Amount Due</h4>
                  </div>
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="font-28 text-center">35,000,000<span class="font-12 text-muted ms-1">UGX</span></h4>
                    <div class="border border-info rounded w-50 text-center bg-info">
                      <h5 class="font-10 text-info mt-2 text-white">Due on <span>28 Sept 2022</span></h5>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center">
                    <button id="approve-btn" class="btn btn-outline-primary mx-1" data-bs-toggle="modal" data-bs-target="#approval-modal" style="width: 120px;">Approve</button>
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
