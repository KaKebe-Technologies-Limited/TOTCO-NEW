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
              <h6 class="">Products</h6>
              <p class="font-12 text-aqua">All products overview</p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Products Table</h4>
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
                        <th>Quantity On Hand</th>
                        <th>Quantity Available</th>
                        <th>Quantity Reserved</th>
                        <th>Quantity Picked</th>
                        <th>Status</th>
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