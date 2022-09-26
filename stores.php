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
                    <h4>Stores</h4>
                    <a href="#" class="btn create-btn control bg-primary">
                      <div class="create-btn-text">Create store</div>
                      <div class="svg-container plus-icon">
                        <svg width="1.00em" height="1em" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 4.5C10.5 4.22386 10.2761 4 10 4C9.72386 4 9.5 4.22386 9.5 4.5V9.5H4.5C4.22386 9.5 4 9.72386 4 10C4 10.2761 4.22386 10.5 4.5 10.5H9.5V15.5C9.5 15.7761 9.72386 16 10 16C10.2761 16 10.5 15.7761 10.5 15.5V10.5H15.5C15.7761 10.5 16 10.2761 16 10C16 9.72386 15.7761 9.5 15.5 9.5H10.5V4.5Z"></path>
                        </svg>
                      </div>
                    </a>
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
                          <h5 class="font-10 text-aqua text-upper">Total Stores</h5>
                          <h2 class="mb-3 font-18">20</h2>
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
                      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-aqua text-upper">Stock</hh5>
                          <h2 class="mb-3 font-18">100000<span class="font-8 text-muted text-upper mx-1">tonnes</span></h2>
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
                          <h5 class="font-10 text-aqua text-upper">Pending</h5>
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
                          <h5 class="font-10 text-aqua text-upper">Rejected</h5>
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
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h1 class="font-14">Stores Overview</h1>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="store-one">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Totco Lira
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="store-one" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
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
                              <th>Product Name</th>
                              <th>Quantity On Hand</th>
                              <th>Quantity Available</th>
                              <th>Quantity Reserved</th>
                              <th>Quantity Picked</th>
                              <th></th>
                            </tr>

                              <?php

                                $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/product/listAllProducts.php");

                                $PHPpdtsObj = json_decode($jsonobj);

                                if ($PHPpdtsObj->success == 0) {
                                    $pdts_error = $PHPpdtsObj->message;
                                } elseif ($PHPpdtsObj->success == 1) {
                                    $pdts_data = $PHPpdtsObj->products;

                                    for ($x = 0; $x < count($pdts_data); $x++) {

                                        echo '

                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                    id="checkbox-' . $pdts_data[$x]->product_id . '">
                                                <label for="checkbox-' . $pdts_data[$x]->product_id . '" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>' . $pdts_data[$x]->pdt_name . '</td>
                                            <td class="text-truncate">
                                            20000
                                            </td>
                                            <td class="align-middle">
                                            12000
                                            </td>
                                            <td>6000</td>
                                            <td>2000</td>
                                            <td>
                                                <div class="badge badge-success">Low</div>
                                            </td>
                                            <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                        </tr>

                                        ';
                                    }
                                }
                              ?>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="store-two">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Store 2
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="store-two" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
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
                              <th>Product Name</th>
                              <th>Quantity On Hand</th>
                              <th>Quantity Available</th>
                              <th>Quantity Reserved</th>
                              <th>Quantity Picked</th>
                              <th></th>
                            </tr>

                              <?php

                                $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/product/listAllProducts.php");

                                $PHPpdtsObj = json_decode($jsonobj);

                                if ($PHPpdtsObj->success == 0) {
                                    $pdts_error = $PHPpdtsObj->message;
                                } elseif ($PHPpdtsObj->success == 1) {
                                    $pdts_data = $PHPpdtsObj->products;

                                    for ($x = 0; $x < count($pdts_data); $x++) {

                                        echo '

                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                    id="checkbox-' . $pdts_data[$x]->product_id . '">
                                                <label for="checkbox-' . $pdts_data[$x]->product_id . '" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>' . $pdts_data[$x]->pdt_name . '</td>
                                            <td class="text-truncate">
                                            20000
                                            </td>
                                            <td class="align-middle">
                                            12000
                                            </td>
                                            <td>6000</td>
                                            <td>2000</td>
                                            <td>
                                                <div class="badge badge-success">Low</div>
                                            </td>
                                            <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                        </tr>

                                        ';
                                    }
                                }
                              ?>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="store-three">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Store 3
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="store-three" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
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
                              <th>Product Name</th>
                              <th>Quantity On Hand</th>
                              <th>Quantity Available</th>
                              <th>Quantity Reserved</th>
                              <th>Quantity Picked</th>
                              <th></th>
                            </tr>

                              <?php

                                $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/product/listAllProducts.php");

                                $PHPpdtsObj = json_decode($jsonobj);

                                if ($PHPpdtsObj->success == 0) {
                                    $pdts_error = $PHPpdtsObj->message;
                                } elseif ($PHPpdtsObj->success == 1) {
                                    $pdts_data = $PHPpdtsObj->products;

                                    for ($x = 0; $x < count($pdts_data); $x++) {

                                        echo '

                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                    id="checkbox-' . $pdts_data[$x]->product_id . '">
                                                <label for="checkbox-' . $pdts_data[$x]->product_id . '" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>' . $pdts_data[$x]->pdt_name . '</td>
                                            <td class="text-truncate">
                                            20000
                                            </td>
                                            <td class="align-middle">
                                            12000
                                            </td>
                                            <td>6000</td>
                                            <td>2000</td>
                                            <td>
                                                <div class="badge badge-success">Low</div>
                                            </td>
                                            <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                        </tr>

                                        ';
                                    }
                                }
                              ?>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="card">
                <div class="summary">
                  <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="chart4" class="chartsh"></div>
                  </div>
                  <div data-tab-group="summary-tab" id="summary-text"></div>
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
