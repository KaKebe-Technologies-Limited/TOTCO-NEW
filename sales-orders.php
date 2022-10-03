<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<?php
require_once __DIR__ . '/Model/API.class.php';

$orderModel = new Api();
$allOrders = $orderModel->getAllSales();


?>

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
<!-- Page title -->
  <div class="d-flex justify-content-between my-5">
    <div class="">
      <div class="page-title">
        <h1 class="font-20">Sales Orders</h1>
        <p class="font-10">All sales order request by agents</p>
      </div>
    </div>
  </div>
<!-- end page title -->
  <section class="section">
    <div class="row flex-wrap">
            <div class="col col-lg-2 col-md-6 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Total sales Orders</h5>
                          <h2 class="mb-3 font-22 text-white" data-number="">100</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">PAID</h5>
                          <h2 class="mb-3 font-22 text-white" data-number>98</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">approved</h5>
                          <h2 class="mb-3 font-22 text-white" data-number="">98</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Pending</h5>
                          <h2 class="mb-3 font-22 text-white" data-number="">02</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Declined</h5>
                          <h2 class="mb-3 font-22 text-white" data-number="">0</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Declined</h5>
                          <h2 class="mb-3 font-22 text-white" data-number="">0</h2>
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
                        <select id="bulk-action"" class="form-select form-control rounded" aria-label=".form-select-sm example">
                            <option selected>Bulk Action</option>
                            <option value="2">Move To Trash</option>
                        </select>
                        <button id="apply-btn" class="btn btn-outline-primary rounded mx-2" type="submit" data-id="<?=$orderResult[0]['id'];?>">Apply</button>
                    </div>
                    <div class="bulk-action col-md-4 mx-3 d-flex">
                        <div id="sort-status" class="col-md-6 ms-2">
                          <select class="form-select form-control rounded" aria-label=".form-select-sm example">
                              <option selected>Sort By Status</option>
                              <option value="1">Paid</option>
                              <option value="2">Approved</option>
                              <option value="3">Pending</option>
                              <option value="4">Declined</option>
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
                        <button type="button" class="btn btn-outline-primary rounded mx-2">Filter</button>
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
                                class="custom-control-input emp_checkbox" data-emp-id="" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Order #</th>
                          <th>Product</th>
                          <th>Quantity<span class="font-10 text-muted ms-1">(Tonnes)</span></th>
                          <th>Price<span class="font-10 text-muted ms-1">(/kg)</span></th>
                          <th>Date</th>
                          <th>Agent Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>

                        <?php foreach($allOrders['orders'] as $order_data): ?>
                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                            id="checkbox-' . $sales_orders[$x]->sales_order_id . '">
                                        <label for="checkbox-' . $sales_orders[$x]->sales_order_id . '" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td><?php echo $order_data['sales_order_id']; ?></td>
                                    <td><?php echo $order_data['pdt_name']; ?></td>

                                    <td><?php echo $order_data['quantity']; ?></td>
                                    <td><?php echo $order_data['unit_price']; ?></td>
                                    <td>28 AUG 2022</td>
                                    <td>Oluk Mark</td>
                                    <td>
                                        <div class="badge badge-success">Approved</div>
                                    </td>
                                    <td>
                                    <div class="d-flex flex-row">
                                        <a title="View sales order" class="btn btn-primary mx-1" href="single-order?id=<?php echo $order_data['sales_order_id']; ?>><i class="fas fa-eye text-white"></i></a>
                                        <a title="Download sales order invoice" class="btn btn-secondary mx-1" href="#"><span><i class="fas fa-download text-white"></i></span></a>
                                        <button class="btn btn-danger mx-1" id="delete-order-btn" type="button"><span><i class="fas fa-trash text-white"></i></span></button>
                                      </div>
                                    </td>
                                </tr>

                        <?php endforeach; ?>

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
