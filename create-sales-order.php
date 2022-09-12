<!-- session -->
<?php include ('includes/load_user.inc.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
    <div class="row">
        <div class="page-title col-12 mt-4">
            <h6 class="">Sales Order Form</h6>
            <p class="font-12 text-aqua">All sales order request by agents</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create new sales order</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="product" class="form-label">Product</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select Product</option>
                                        <option value="1">Maize</option>
                                        <option value="2">Beans</option>
                                        <option value="3">Soybeans</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Quantity" class="form-label">Quantity</label>
                                    <input id="quantity" type="text" class="form-control" name="quantity">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input id="price" type="text" class="form-control" name="price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="branch" class="form-label">Branch</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select Branch</option>
                                        <option value="1">Lira</option>
                                        <option value="2">Branch 2</option>
                                        <option value="3">Branch 3</option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div>
            </div>
        </div>
    </div>
</main>




 <!-- footer -->
 <?php include './includes/footer.inc.php'; ?>
    </div>
  </div>
  <!-- scripts -->
  <?php include ('./includes/scripts.inc.php'); ?>
  <!-- end scripts -->