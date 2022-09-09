<!-- session -->
<?php include '../includes/load_user.php'; ?>

<!-- Header -->
<?php include('../includes/header.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('../includes/sidebar.php'); ?>
<!-- End Sidebar -->

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
            <div class="row">
              <div class="page-title col-12 my-4">
                <h6 class="">All Sales Order</h6>
                <p class="font-12 text-aqua">Sales orders by agents</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="table-top-header card-header row">
                      <div>
                        <ul class="nav">
                          <li class="nav-item"><a class="nav-link" href="">All (204)</a></li>
                          <li class="nav-item"><a class="nav-link" href="">Paid (200)</a></li>
                          <li class="nav-item"><a class="nav-link" href="">Confirmed (202)</a></li>
                          <li class="nav-item"><a class="nav-link" href="">Rejected (0)</a></li>
                          <li class="nav-item"><a class="nav-link" href="">Pending (2)</a></li>
                        </ul>
                      </div>
                  </div>
                  <div class="row card- d-flex justify-content-between py-4">
                    <div class="col-md-4 d-flex me-3">
                      <div class="bulk-action col-md-8 mx-1">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Bulk Action</option>
                              <option value="1">Confirm</option>
                              <option value="2">Reject</option>
                          </select>
                      </div>
                      <div>
                        <button type="button" style="height: 40px;"  class="btn btn-outline-primary rounded">Apply</button>
                      </div>
                    </div>
                    <div class="col-md-4 d-flex mx-3">
                      <div class="bulk-action col-md-5 mx-1">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Sort By</option>
                              <option value="1">Pending</option>
                              <option value="2">Confirmed</option>
                              <option value="2">Fullfilled</option>
                              <option value="2">Paid</option>
                          </select>
                      </div>
                      <div class="bulk-action col-md-7 mx-1">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Filter By Date</option>
                              <option value="1">Today</option>
                              <option value="2">Yesterday</option>
                              <option value="2">Last 7 Days</option>
                              <option value="2">Last 30 Days</option>
                              <option value="2">Custom Range</option>
                          </select>
                      </div>
                      <div class="filter-btn">
                        <button type="button" style="height: 40px" class="btn btn-outline-primary rounded">Filter</button>
                      </div>
                    </div>
                    <form class="col-md-2 search-form mx-3">
                        <div class="">
                            <input type="search" class="form-control rounded" id="exampleFormControlInput1" placeholder="Search">
                        </div>
                    </form>
                      <!-- <div class="form-export d-flex ml-3">
                          <div class="mx-2">
                              <button type="button" class="btn btn-outline-primary rounded"><i class="fa fa-print"></i></button>
                          </div>
                          <div class="mx-2">
                              <button class="btn btn-outline-primary rounded">Export</button>
                          </div>
                      </div> -->
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
                          <th>Branch</th>
                          <th>Agent Name</th>
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
                          <td>
                            <div class="">28 Aug 2022</div>
                          </td>
                          <td>
                            Lira
                          </td>
                          <td>
                            <div class="">Oluk Mark</div>
                          </td>
                          <td>
                            <div class="badge badge-success">CONFIRMED</div>
                          </td>
                          <td>
                          <div class="d-flex flex-row">
                              <div class="p-2 mx-1 bg-primary"><a href="../totco/single-sales-order.php"><i class="fas fa-eye text-white"></i></a></div>
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
        </main>
        <!-- footer -->
      <?php include '../includes/footer.php'; ?>

        <!-- END MAIN AREA -->
<!-- Scripts -->
<?php include('../includes/scripts.php'); ?>
<!-- End Scripts -->