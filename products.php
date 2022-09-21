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
        <section>
          <div class="row">
          <div class="col col-xs-12">
              <div class="card bg-prussian-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-pale-sandy-brown text-upper">Total sales Orders</h5>
                          <h2 class="mb-3 font-18 text-white">100</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-xs-12">
              <div class="card bg-prussian-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-pale-sandy-brown text-upper">PAID</h5>
                          <h2 class="mb-3 font-18 text-white">98</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-xs-12">
              <div class="card bg-prussian-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-pale-sandy-brown text-upper">APPROVED</h5>
                          <h2 class="mb-3 font-18 text-white">98</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-xs-12">
              <div class="card bg-prussian-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-pale-sandy-brown text-upper">Pending</h5>
                          <h2 class="mb-3 font-18 text-white">2</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-xs-12">
              <div class="card bg-prussian-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-pale-sandy-brown text-upper">Rejected</h5>
                          <h2 class="mb-3 font-18 text-white">0</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Products Table</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
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
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Product ID</th>
                        <th>Assigh Date</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Action</th>
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
                                    ' . $pdts_data[$x]->unit_price . '
                                    </td>
                                    <td class="align-middle">
                                    ' . $pdts_data[$x]->product_id . '
                                    </td>
                                    <td>--</td>
                                    <td>--</td>
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
        </section>
        <!-- footer -->
        <?php include 'includes/footer.inc.php'; ?>
        <!-- footer -->