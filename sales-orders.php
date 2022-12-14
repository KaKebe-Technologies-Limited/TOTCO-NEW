<!-- session -->
<?php include('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<!-- API Instantiations -->

<?php
require_once __DIR__ . '/Model/API.class.php';

$orderModel = new Api();
$salesModel = $orderModel->getAllSales();
$countOrdersModel = $orderModel->getOrderCount();
$countApprovedOrders = $orderModel->countApprovedOrders();
$countPendingOrders = $orderModel->countPendingOrders();
$countRejectedOrders = $orderModel->countDeclinedOrders();

?>

<!-- End API Instantiations -->

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
  <!-- Page title -->
  <div class="d-flex justify-content-between my-3">
      <div class="page-title">
        <h1 class="font-20">Sales Orders</h1>
        <p class="font-10">All sales order request by agents</p>
      </div>
  </div>
  <!-- end page title -->
  <section class="section">
    <div class="row flex-wrap">
      <div class="col col-lg-4 col-md-6 col-sm-12">
        <div class="card bg-dark-electric-blue">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-10 text-white text-upper">Total sales Orders</h5>
                    <h2 class="mb-3 font-22 text-white" data-number=""><?php echo $countOrdersModel;  ?></h2>
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
                    <h2 class="mb-3 font-22 text-white" data-number="">3</h2>
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
                    <h2 class="mb-3 font-22 text-white" data-number="">4</h2>
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
                    <h2 class="mb-3 font-22 text-white" data-number="">4</h2>
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
          <div class="card-header py-4 d-flex">
            <div class="bulk-action col-md-3 mx-3 d-flex">
              <select id="bulk-action"" class=" form-select form-control rounded" aria-label=".form-select-sm example">
                <option selected>Bulk Action</option>
                <option value="2">Move To Trash</option>
              </select>
              <button id="apply-btn" class="btn btn-outline-primary rounded mx-2" type="submit" data-id="<?= $orderResult[0]['id']; ?>">Apply</button>
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
                <div class="input-group">
                  <input id="DateRange" type="text" name="DateRange" class="form-control" style="border-color: #fff !important;" id="initial_date" placeholder="select period">
                  <input type="hidden" id="start_date" value="">
                  <input type="hidden" id="end_date" value="">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="order-table" class="table table-striped table-hover display select" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">

                    </th>
                    <th>Order #</th>
                    <th>Product</th>
                    <th>Quantity<span class="font-10 text-muted ms-1">(Kgs)</span></th>
                    <th>Price<span class="font-10 text-muted ms-1">(/kg)</span></th>
                    <th>Date</th>
                    <th>Agent Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- footer -->
  <!-- script -->
  <script src="assets/js/tables/salesdata.js"></script>
<?php include './includes/footer.inc.php'; ?>