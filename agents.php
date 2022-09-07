

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
                    <h4>All Vendors</h4>
                    <button class="btn btn-primary">Add vendor</button>
                </div>
            </div>

            <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header py-4">
                    <div class="bulk-action mx-3">
                        <select class="form-select" aria-label=".form-select-sm example">
                            <option selected>Bulk Action</option>
                            <option value="1">Edit</option>
                            <option value="2">Delete</option>
                        </select>
                    </div>
                    <form class="search-form mx-3">
                        <div class="">
                            <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search">
                        </div>
                    </form>
                    <div class="form-export d-flex ml-3">
                        <div>
                            <button><span><i class="fa fa-print"></i></span></button>
                        </div>
                        <div>
                            <button>Export</button>
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
                        <th>Location</th>
                        <th>Contact</th>
                        <th>Email</th>
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
                        <td>Oluk Mark</td>
                        <td class="text-truncate">
                            0771404884
                        </td>
                        <td class="align-middle">
                            holmark5@gmail.com
                        </td>
                        <td>
                          <div class="badge badge-success">Low</div>
                        </td>
                        <td>
                        <div class="d-flex flex-row">
                            <div class="p-2 mx-1 bg-primary"><a href><i class="fas fa-eye text-white"></i></a></div>
                            <div class="p-2 mx-1 bg-secondary"><a href><span><i class="fas fa-edit text-white"></i></span></a></div>
                            <div class="p-2 mx-1 bg-danger"><a href=""><span><i class="fas fa-trash text-white"></i></span></a></div>
                        </div
                        </td>
                      </tr>

                    </table>
                  </div>
                </div>
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