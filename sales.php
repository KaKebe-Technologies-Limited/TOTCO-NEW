<!-- session -->
<?php include ('includes/load_user.inc.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<?php include('salesFunction.php'); ?>



<!-- Main Content -->
<main class="main-content pt-5 mt-3">

          <div class="d-flex justify-content-between my-5">
            <div class="">
              <div class="page-title">
                <h6 class="">Sales Orders</h6>
                <p class="font-12 text-aqua">All sales order request by agents</p>
              </div>
            </div>
            <div class="">
              <a href="create-sales-order.php" class="btn btn-primary btn-lg" role="button">Add New</a>
            </div>
          </div>
            <section class="section">
            <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-aqua text-upper">All Sales Orders</h5>
                          <h2 class="mb-3 font-18">100</h2>
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
                          <h5 class="font-12 text-aqua text-upper">Confirmed</h5>
                          <h2 class="mb-3 font-18">98</h2>
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
                          <h5 class="font-12 text-aqua text-upper">Pending</h5>
                          <h2 class="mb-3 font-18">2</h2>
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
                          <h5 class="font-12 text-aqua text-upper">Rejected</h5>
                          <h2 class="mb-3 font-18">0</h2>
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
                  <div class="card-header py-4 d-flex justify-content-between">
                    <div class="bulk-action col-md-3 mx-3 d-flex">
                        <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                            <option selected>Bulk Action</option>
                            <option value="2">Delete</option>
                        </select>
                        <button class="btn btn-primary rounded mx-2" type="submit">Apply</button>
                    </div>
                    <div class="bulk-action col-md-4 mx-3 d-flex">
                        <div id="sort-status" class="col-md-6 ms-2">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Sort By Status</option>
                              <option value="1">Paid</option>
                              <option value="2">Confirmed</option>
                              <option value="3">Pending</option>
                              <option value="4">Rejected</option>
                          </select>
                        </div>
                        <div id="sort-date" class="col-md-6 ms-2">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Sort By Date</option>
                              <option value="2">Today</option>
                              <option value="2">Yesterday</option>
                              <option value="2">Last 7 Days</option>
                              <option value="2">Last 30 Days</option>
                              <option value="2">Custom Range</option>
                          </select>
                        </div>
                        <button type="button" class="btn btn-primary rounded mx-2">Filter</button>
                      </div>
                      <div class="col-md-2">
                          <input type="search" class="form-control rounded" placeholder="Search">
                      </div>
                    </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
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
                          <th>Price/kg</th>
                          <th>Created</th>
                          <th>Agent Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <?php loadProducts(); ?>
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
                          <td>UGX 3500</td>
                          <td>
                            <div class="">28 Aug 2022</div>
                          </td>
                          <td>
                            <div class="">Oluk Mark</div>
                          </td>
                          <td>
                            <div class="badge badge-success">CONFIRMED</div>
                          </td>
                          <td>
                          <div class="d-flex flex-row">
                              <div class="p-2 mx-1 bg-primary"><a href="single-sales-order.php"><i class="fas fa-eye text-white"></i></a></div>
                              <div class="p-2 mx-1 bg-secondary"><a href><span><i class="fas fa-download text-white"></i></span></a></div>
                              <div class="p-2 mx-1 bg-danger"><a href=""><span><i class="fas fa-trash text-white"></i></span></a></div>
                          </div
                          </td>
                        </tr>

                      </table>
                    </div>
                  </div>
                  <nav aria-label="...">
                    <ul class="pagination pagination-sm justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>
          </div>
          </section>
        </main>
       <!-- footer -->
      <?php include './includes/footer.inc.php'; ?>
    </div>
  </div>
  <!-- scripts -->
  <?php include ('./includes/scripts.inc.php'); ?>
  <!-- end scripts -->