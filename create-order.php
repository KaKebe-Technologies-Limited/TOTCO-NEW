<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<?php //include ('controllers/create_orders.php'); ?>

<!-- Main Content -->
<main class="main-content pt-5 mt-3">
    <section>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="https://totco.kakebe.com/api/api/sales_orders/createSalesOrder.php?username=$user_name&pdt_name=$pdtID&quantity=$qnty&selling_price=$selling_price" method="POST" class="form-horizontal">
                            <label class="col-sm-2 control-label">Product name</label>
                            <input type="text" class="form-control" id="pdt_name" name="pdt_name">
                            <label class="col-sm-2 control-label">Price</label>
                            <input type="text" class="form-control" id="selling_price" name="selling_price">
                            <label class="col-sm-2 control-label">Price</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                            <button type="submit" name="createBtn" class="btn btn-primary">Add order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
       <!-- footer -->
      <?php include './includes/footer.inc.php'; ?>
