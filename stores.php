<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->


<!-- Main Content -->
          <main class="main-content pt-5 mt-3">
            <div class="row">
                <div class="header d-flex justify-content-between  py-4 my-3">
                    <div class="page-title">
                      <h1 class="font-20">Stores</h1>
                      <p class="font-10">An overview of Totco stores & warehouses</p>
                    </div>
                    <div class="float-end">
                      <ol class="breadcrumb d-flex align-items-center">
                          <li class="breadcrumb-item">
                              <a href="#" class="btn btn-round btn-primary offcanvas-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight role="button" aria-controls="Rightbar">Add a new store</a>
                          </li>
                      </ol>
                    </div>

                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-body">
                      <div class="offcanvas-header border-none">
                        <div class="col">
                            <h5 class="mt-1">Create a new store</h5>
                        </div>
                        <div class="col-auto me-4">
                            <button type="button" class="btn-close text-reset p-0 m-0 align-self-center float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                      </div>
                      <div>
                        <form>
                          <div class="mb-3">
                            <label for="store-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="store-name">
                          </div>
                          <div class="mb-3">
                            <label for="store-location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="store-name">
                          </div>
                          <div class="mb-3">
                            <label for="store-manager" class="form-label">Manager</label>
                            <input type="text" class="form-control" id="store-manager">
                          </div>
                          <button type="submit" class="btn btn-primary offset-lg-5">Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <section class="section">
            <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Total Stores</h5>
                          <h2 class="mb-3 font-18 text-white">20</h2>
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
                      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Stock</hh5>
                          <h2 class="mb-3 font-18 text-white">100000<span class="font-8 text-white text-upper mx-1">tonnes</span></h2>
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
                          <h5 class="font-10 text-white text-upper"></h5>
                          <h2 class="mb-3 font-18 text-white">2</h2>
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
                          <h5 class="font-10 text-white text-upper">Rejected</h5>
                          <h2 class="mb-3 font-18 text-white">0</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h1 class="font-14">Stores Overview</h1>
                </div>
                <div class="card-body">
                  <table id="stores-table" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th></th>
                          <th>ID</th>
                          <th>Branch Name</th>
                          <th>Location</th>
                        </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header py-4 d-flex justify-content-between">
                    <h1 class="font-14">Accepted Deliveries</h1>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <tr>
                          <th class="text-center">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                class="custom-control-input emp_checkbox" data-emp-id="" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Delivery #</th>
                          <th>Status</th>
                          <th>Delivery Weight</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>D001</td>
                          <td class="text-truncate">
                          Maize
                          </td>
                          <td class="align-middle">
                          10000
                          </td>
                          <td>
                            <div class="">3500</div>
                          </td>
                          <td>
                            <div class="d-flex flex-row">
                                <div class="p-2 mx-1 bg-primary"><a href="single-order"><i class="fas fa-eye text-white"></i></a></div>
                                <div class="p-2 mx-1 bg-secondary"><a href><span><i class="fas fa-download text-white"></i></span></a></div>
                                <div class="p-2 mx-1 bg-danger"><a href=""><span><i class="fas fa-trash text-white"></i></span></a></div>
                            </div>
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
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header py-4 d-flex justify-content-between">
                    <h1 class="font-14">Low Inventory</h1>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th>Item</th>
                          <th>Item ID</th>
                          <th>Quantity<span class="text-muted font-10 ms-1">(Tonnes)</span></th>
                        </tr>
                        <tr>
                          <td>Beans</td>
                          <td>1</td>
                          <td>10000</td>
                          <td>
                            <button type="button" class="btn btn-primary">Reorder</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Beans</td>
                          <td>1</td>
                          <td>10000</td>
                          <td>
                            <button type="button" class="btn btn-primary">Reorder</button>
                          </td>
                        </tr>
                        <tr>
                          <td>Beans</td>
                          <td>1</td>
                          <td>10000</td>
                          <td>
                            <button type="button" class="btn btn-primary">Reorder</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section>
          <section class="my-3">
          </section>
        </main>
       <!-- footer -->
      <?php include './includes/footer.inc.php'; ?>
    </div>
  </div>
