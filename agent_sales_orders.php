<!-- session -->
<?php include 'includes/load_user.php'; ?>

<!-- Header -->
<?php include('includes/header.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.php'); ?>
<!-- End Sidebar -->

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
            <div class="row">
                <div class="header d-flex justify-content-between  py-4 my-3">
                    <h4>Sales Orders by <?php echo $user_data->firstname . " " . $user_data->lastname; ?></h4>
                </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header py-4">
                    <div class="bulk-action mx-3">
                        <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                            <option selected>Bulk Action</option>
                            <option value="1">Edit</option>
                            <option value="2">Delete</option>
                        </select>
                    </div>
                      <form class="search-form mx-3">
                          <div class="">
                              <input type="search" class="form-control rounded" id="exampleFormControlInput1" placeholder="Search">
                          </div>
                      </form>
                      <div class="form-export d-flex ml-3">
                          <div class="mx-2">
                              <button class="btn btn-outline-primary rounded"><i class="fa fa-print"></i></button>
                          </div>
                          <div class="mx-2">
                              <button class="btn btn-outline-primary rounded">Export</button>
                          </div>
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
                            <div class="">Oluk Mark</div>
                          </td>
                          <td>
                            <div class="badge badge-success">CONFIRMED</div>
                          </td>
                          <td>
                          <div class="d-flex flex-row">
                              <div class="p-2 mx-1 bg-primary"><a href="sales-order.php"><i class="fas fa-eye text-white"></i></a></div>
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
      <?php include 'includes/footer.php'; ?>

        <!-- END MAIN AREA -->
<!-- Scripts -->
<?php include('includes/scripts.php'); ?>
<!-- End Scripts -->