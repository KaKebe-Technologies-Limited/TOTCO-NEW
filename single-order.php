<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->
<!-- API instantiation -->
<?php
require_once __DIR__ . '/Model/API.class.php';

$singleModel = new Api();
$singleOrder = $singleModel->getSingleOrderID($_GET["id"]);

//get user
$userId = $singleOrder->order_status->user_id;

?>

<!-- End API instantiation -->

<!-- Query Params -->
<script type="text/javascript">

  const queryString = window.location.search
  const urlParams = new URLSearchParams(queryString)
  const orderId = urlParams.get('id')

</script>
<!-- end query param -->

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="page-title col-12 mb-2">
              <h6 class="font-20">Sales Order</h6>
              <p class="font-10 text-aqua"><?php //print_r($_GET["id"]); ?></p>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card bg-dark-electric-blue">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-12 text-white text-upper">Order #</h5>
                          <h2 class="text-white my-3 font-18"><?php echo $singleOrder->order_status->sales_order_id; ?></h2>
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
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-10 text-white text-upper">Order Date</h5>
                          <h2 class="text-white font-18 my-3">
                           <?php echo date("d M", strtotime($singleOrder->order_status->createdAt)); ?>

                          </h2>
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
                          <h5 class="font-10 text-white text-upper">Order Status</h5>
                          <?php
                              if ($singleOrder->order_status->isPending == 1) {
                                echo '<div id="status" class="badge badge-primary text-white mt-3">Pending</div>';
                              } else {
                                if ($singleOrder->order_status->isApproved == 1 ) {
                                  echo '<div id="status" class="badge badge-success text-white mt-3">Approved</div>';
                                } else {
                                  if ($singleOrder->order_status->isRejected == 1) {
                                    echo '<div id="status" class="badge badge-danger text-white mt-3">Rejected</div>';
                                  } else {
                                    echo '<div id="status" class="badge badge-Warning text-white mt-3">----</div>';
                                  }
                                }

                              }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="single-agent.php?user_id=<?= $userId; ?>">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-10 text-dark text-upper">Agent Name</h5>
                            <h1 class="font-15 text-dark mb-0"><?php echo $singleOrder->order_status->Agent_Name; ?></h1>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                          <img  style="height: 78px;"src="assets/img/63475.jpg">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          <div class="row d-flex">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title font-12 text-upper">Sales Order</h4>
                  <div class="card-header-form">
                    <button onclick="generateProforma(orderId)"class="btn btn-outline-primary btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"></path>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                      </svg>
                      Proforma Invoice
                            </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="billing p-4 d-flex justify-content-between mb-4 border">
                    <div class="agent-detail">
                      <h5 class="font-14 text-dark"><?= $singleOrder->order_status->Agent_Name; ?></h5>
                      <p class="m-0 p-0">Odokomit, Lira</span></p>
                      <p class="m-0 p-0">0771404884</p>
                    </div>
                    <div class="buyer-detail">
                      <h5 class="font-14 text-dark">Billed To</h5>
                      <p class="font-12 text-dark m-0 p-0">TOTCO Uganda LTD</p>
                      <p class="font-12 text-dark m-0 p-0">Odokomit, Lira City</p>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Item Name</th>
                        <th>Quantity<span class="font-12 text-muted ms-1">(Kgs)</span></th>
                        <th>Price<span class="font-12 text-muted ms-1">(/kg)</span></th>
                        <th>Total<span class="font-12 text-muted ms-1">(UGX)</span></th>
                      </tr>
                      <tr>
                        <td><?php echo $singleOrder->order_items[0]->pdt_name; ?></td>
                        <td class="">
                          <?php echo $singleOrder->order_items[0]->quantity; ?>
                        </td>
                        <td class="align-middle">
                          <?php echo $singleOrder->order_items[0]->selling_price; ?><span class="font-12 ps-1 text-muted">UGX</span>
                        </td>
                        <td class="fw-bold">
                        <?php echo $singleOrder->order_items[0]->selling_price * $singleOrder->order_items[0]->quantity; ?><span class="font-12 ps-1 text-muted">UGX</span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column">
              <div class="">
                <div class="card">
                  <div class="card-header">
                    <h4 class="font-12 text-upper">Amount Due</h4>
                  </div>
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="font-28 text-center"> <?php echo $singleOrder->order_items[0]->selling_price * $singleOrder->order_items[0]->quantity; ?><span class="font-12 text-muted ms-1">UGX</span></h4>
                    <div class="border border-info rounded w-50 text-center bg-info">
                      <h5 class="font-10 text-info mt-2 text-white">Due on <span>28 Sept 2022</span></h5>
                    </div>
                  </div>
                  <div id="approveSwitch" class="card-footer d-flex justify-content-center">
                    <button id="approve-btn" class="btn btn-outline-primary mx-1" style="width: 120px;" role="button">Confirm</button>
                    <button id="reject-btn" class="btn btn-outline-primary mx-1" style="width: 120px;" role="button">Reject</button>
                  </div>
                </div>
              </div>
              <script>
                let status = document.getElementById('status');
                let approvalBtns = document.getElementById('approvalSwitch');

                if (status.textContent == 'Approved') {
                  approvalBtns.style.display = 'none'
                }
              </script>
            </div>
          </div>
        </section>

      <!-- Freshchat -->
      <script src='//fw-cdn.com/2136961/2841591.js' chat='true'></script>
      <script>
  window.fcWidgetMessengerConfig = {
    config: {
      hideFileUpload: false,
      fullscreen: false,
      disableEvents: true,
      cssNames: {
        widget: 'fc_frame',
        open: 'fc_open',
        expanded: 'fc_expanded'
      },
      showFAQOnOpen: true,
      hideFAQ: true,
      agent: {
        hideName: false,
        hidePic: false,
        hideBio: false,
      },
      headerProperty: {
	      //If you have multiple sites you can use the appName and appLogo to overwrite the values.
      	appName: 'Gadget God',
        appLogo: 'https://d1qb2nb5cznatu.cloudfront.net/startups/i/2473-2c38490d8e4c91660d86ff54ba5391ea-medium_jpg.jpg?buster=1518574527',
        backgroundColor: '#dc9189',
        foregroundColor: '#fff',
        backgroundImage: 'https://wchat.freshchat.com/assets/images/texture_background_1-bdc7191884a15871ed640bcb0635e7e7.png'
      },
      content: {
        placeholders: {
          search_field: 'Search',
          reply_field: 'Reply',
          csat_reply: 'Add your comments here'
        },
        actions: {
          csat_yes: 'Yes',
          csat_no: 'No',
          push_notify_yes: 'Yes',
          push_notify_no: 'No',
          csat_submit: 'Submit'
        },
        headers: {
          chat: 'Chat with Us',
          faq: 'Solution Articles',
          faq_search_not_available: 'No articles were found for {{query}}',
          faq_useful: 'Was this article helpful?',
          faq_thankyou: 'Thank you for your feedback',
          faq_message_us: 'Message Us',
          push_notification: 'Don\'t miss out on any replies! Allow push notifications?',
          csat_question: 'Did we address your concerns??',
          csat_yes_question: 'How would you rate this interaction?',
          csat_no_question: 'How could we have helped better?',
          csat_thankyou: 'Thanks for the response',
          csat_rate_here: 'Submit your rating here',
          channel_response: {
            offline: 'We are currently away. Please leave us a message',
            online: {
              minutes: {
                one: "Currently replying in {!time!} minutes ",
                more: "Typically replies in {!time!} minutes"
              },
              hours: {
                one: "Currently replying in under an hour",
                more: "Typically replies in {!time!} hours",
              }
            }
          }
        }
      }
    }
  }

  window.fcWidget.init({
    token: "WEB_CHAT_TOKEN",
    host: "https://wchat.freshchat.com",
    externalId: <?php echo $singleOrder->order_status->createdBy; ?>,     // user’s id unique to your system
    firstName: "John",              // user’s first name
    lastName: "Doe",                // user’s last name
    email: "john.doe@gmail.com",    // user’s email address
    phone: "8668323090",            // phone number without country code
    phoneCountryCode: "+1"          // phone’s country code
  });
</script>

<!-- footer -->
<?php include 'includes/footer.inc.php'; ?>
    </div>
  </div>
