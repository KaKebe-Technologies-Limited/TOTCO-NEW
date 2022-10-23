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
                      <h1 class="font-20">All Agents</h1>
                      <p class="font-10">Overview of all registered agents </p>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header py-4">
                    <div class="bulk-action d-flex mx-3">
                        <select class="form-select" aria-label=".form-select-sm example">
                            <option selected>Bulk Action</option>
                            <option value="1">Edit</option>
                            <option value="2">Move To Trash</option>
                        </select>
                        <button type="submit" class="btn btn-primary rounded mx-2">Apply</button>
                    </div>
                    <form class="search-form mx-3">
                        <div class="">
                            <input type="search" class="form-control rounded" id="exampleFormControlInput1" placeholder="Search">
                        </div>
                    </form>
                    <div class="form-export d-flex ml-3">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle rounded" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-file-earmark-arrow-down"></i><span class="ms-2">Export</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">PDF</a></li>
                          <li><a class="dropdown-item" href="#">Excel</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="agent-table" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Location</th>
                          <th>Contact</th>
                          <th>Email</th>
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
        </main>

        <!-- script -->
        <script src="assets/js/tables/storesdata.js"></script>
        <!-- footer -->
      <?php include 'includes/footer.inc.php'; ?>
    </div>
  </div>
