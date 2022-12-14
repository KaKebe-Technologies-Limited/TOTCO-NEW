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
$salesModel = $orderModel->getAllSales();
$countOrdersModel = $orderModel->getOrderCount();
$userModel = $orderModel->getAllUsers();

?>

      <!-- Main Content -->
      <div class="main-content d-flex flex-wrap">
        <div class="container main-grid col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <section class="section header">
            <div class="row">
              <div class="page-title col-12 mb-5">
                <h1 id="welcome-title" class="font-20 animate-greetings" data-greeting=""></h1>
              </div>
              <script>
                const welcomeTitle = document.querySelector('#welcome-title')
                const animateGreetings = document.querySelector('.animate-greetings')

                var phrase = [
                        [18, 'Good evening'],
                        [12, 'Good afternoon'],
                        [5,  'Good morning']
                ],

                hr = new Date().getHours();

                for (var i = 0; i < phrase.length; i++) {
                    if (hr >= phrase[i][0]) {
                        animateGreetings.classList.add('animate__animated','animate__slideInDown');
                        welcomeTitle.innerHTML +=phrase[i][1] + ', ' + '<?php echo ($user_data->firstname ? $user_data->firstname : $user_data->username) . " " . ($user_data->lastname ?  $user_data->lastname : " " ); ?>'
                        break;
                    }
                }
              </script>
            </div>
          </section>
          <section class="my-3">
            <div class="section-header">
              <h1 class="font-14">Purchase Overview</h1>
            </div>
            <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="card bg-dark-chessnut">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pr-0 pt-3 d-flex align-items-center border-end-xl-lg-md">
                            <hgroup class="">
                              <h5 class="font-10 text-white text-upper">Total Purchase Amount</h5>
                              <h2 class="mb-3 font-30 text-white">100,000,000<span class="text-white text-upper font-10 ms-1">UGX</span></h2>
                            </hgroup>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <h5 class="font-10 text-white text-upper">total payouts</h5>
                            <h2 class="mb-3 font-22 text-white">90,000,000<span class="text-white text-upper font-10 ms-1">UGX</span></h2>
                            <h5 class="font-10 text-white text-upper">total balance</h5>
                            <h2 class="mb-3 font-22 text-white">10,000,000<span class="text-white text-upper font-10 ms-1">UGX</span></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card bg-dark-electric-blue">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-white text-upper">No. of Purchase</h5>
                            <h2 class="mb-3 font-22 text-white">100</h2>
                            <h5 class="font-10 text-white text-upper">Declined</h5>
                            <h2 class="mb-3 font-22 text-white">03</h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="my-3">
          <div class="section-header">
              <h1 class="font-14">Sales Order Overview</h4>
            </div>
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-muted text-upper">total suppliers</h5>
                            <h2 class="mb-3 font-22 text-dark-electric-blue"><?= $userModel->totalCount; ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-muted text-upper">total sales orders</h5>
                            <h2 class="mb-3 font-22 text-dark-electric-blue"><?= $countOrdersModel; ?></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-muted text-upper">Total Overdue Amount</h5>
                            <h2 class="mb-3 font-22 text-dark-electric-blue">20,000,000<span class="font-10 text-muted mx-1">UGX</span></h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="my-3">
            <div class="section-header d-flex justify-content-between align-items-center">
              <div class="title d-flex align-items-center pt-2">
                <h1 class="font-14">Recent Orders</h1>
              </div>
              <div class="btn">
                <a href="sales-orders" class="btn btn-outline-primary btn-sm text-upper font-10">See All</a>
              </div>
            </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <tr>
                          <th>Order #</th>
                          <th>Product</th>
                          <th>Quantity<span class="font-12 text-muted ms-1">(Kgs)</span></th>
                          <th>Price<span class="font-12 text-muted ms-1">(/kg)</span></th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>


                              <?php foreach (array_slice($salesModel, 0, 3) as $order): ?>
                            <tr>
                              <td><?= $order->order_status->sales_order_id; ?></td>
                              <td><?= $order->order_items[0]->pdt_name; ?></td>
                              <td class="text-truncate"><?= $order->order_items[0]->quantity; ?></td>
                              <td><?= $order->order_items[0]->selling_price; ?></td>
                              <td><?= $order->order_status->createdAt; ?></td>
                              <td>
                                  <div class="badge badge-success"><?= $order->order_status->isPending; ?></div>
                              </td>
                            </tr>
                            <?php endforeach ?>
                       
                      </table>
                    </div>
                  </div>
          </section>
        </div>
        <div class="container right-bar col-xl-4 col-lg-8 col-md-4 col-sm-4 col-xs-12">
          <section class="my-3">
            <div class="section-header">
              <h1 class="font-14">Chart</h1>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="chart3" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="my-3">
            <div class="section-header d-flex justify-content-between align-items-center mb-2">
              <div class="title d-flex align-items-center pt-2">
                <h1 class="font-14">Recent Transactions</h1>
              </div>
              <div class="">
                <a href="" class="btn btn-outline-primary btn-sm text-upper font-10">See All</a>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="card min-height-200">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="simple-bar-content-wrapper p-2">
                      <div class="activity">
                        <div class="activity-info">
                          <div class="icon-info-activity">
                          <i class="bi bi-check2 bg-soft-primary"></i>
                          </div>
                          <div class="activity-info-text">
                              <div class="d-flex justify-content-between align-items-center">
                                  <p class="text-muted mb-0 font-13 w-75">
                                      <span>Totco</span>  has paid invoice no. T001.
                                  </p>
                                  <small class="text-muted">3 mins ago</small>
                              </div>
                          </div>
                        </div>
                        <div class="activity-info">
                            <div class="icon-info-activity">
                              <i class="bi bi-check2 bg-soft-primary"></i>
                            </div>
                            <div class="activity-info-text">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0 font-13 w-75">
                                        <span>Totco</span> has approved sales order no. T001.
                                    </p>
                                    <small class="text-muted">3 mins ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="activity-info">
                            <div class="icon-info-activity">
                              <i class="bi bi-x bg-soft-primary" ></i>
                            </div>
                            <div class="activity-info-text">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0 font-13 w-75">
                                        <span>Totco</span> has declined sales order no. T002.
                                    </p>
                                    <small class="text-muted">3 mins ago</small>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="my-3">
            <div class="section-header">
              <h1 class="font-14">Chart</h1>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="card min-height-200">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-muted text-upper">PAID</h5>
                          <h2 class="mb-3 font-18 text-dark">98</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- footer -->
      <?php include 'includes/footer.inc.php'; ?>
    </div>
  </div>

</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>