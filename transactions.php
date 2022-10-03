<!-- session -->
<?php include ('controllers/load_user.php'); ?>

<!-- Header -->
<?php include('includes/header.inc.php'); ?>
<!-- end Header -->

<!-- Main-Sidebar -->
<?php include('includes/sidebar.inc.php'); ?>
<!-- End Sidebar -->

<!-- MAIN CONTENT -->
<main class="main-content pt-5 mt-3">
    <div class="container-fluid">
        <!-- Page title -->
        <div class="row">
            <div class="col-12 my-5">
                <div class="page-title-box">
                    <h4 class="page-title">Transactions</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="card col-12">
                <div class="row mb-4 align-items-end">
                    <div class="col-md-3">
                        <label for="">Period</label>
                        <div class="input-group">
                            <input type="text" name="DateRage" class="form-control" style="border-color: #fff !important;" id="initial_date" placeholder="select period">
                            <input type="hidden" id="start_date" value="2022-08-29">
                            <input type="hidden" id="end_date" value="2022-09-27">
                            <span class="input-group-text" ><i class="far fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4">Transaction</label>
                        <div class="selectr-container selectr-desktop has-selected" style="width: 100%;">
                            <div class="selectr-options-container">
                                <div class="selectr-input-container">
                                    <input class="selectr-input" tagindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="true" role="textbox" type="search" tabindex="-1">
                                    <button class="btn btn-primary selectr-input-clear" type="button"></button>
                                </div>
                                <div class="selectr-notice">
                                </div>
                                <ul class="selectr-options" role="tree" aria-hidden="true" aria-expanded="false">
                                </ul>
                            </div>
                            <select id="transaction-category" name="transaction-category" style="border-color: #fff !important;" class="custom-select selectr-hidden" placeholder="Transaction Category" tabindex="-1" aria-hidden="true">
                                    <option value="ALL" selected="">All</option>
                                    <option value="transaction 1">transaction 1</option>
                                    <option value="transaction 2">transaction 2</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4">Status</label>
                        <div class="selectr-container selectr-desktop has-selected" style="width: 100%;">
                            <div class="selectr-options-container">
                                <div class="selectr-input-container">
                                    <input class="selectr-input" tagindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="true" role="textbox" type="search" tabindex="-1">
                                    <button class="selectr-input-clear" type="button"></button>
                                </div>
                                <div class="selectr-notice"></div>
                                <ul class="selectr-options" role="tree" aria-hidden="true" aria-expanded="false"></ul>
                            </div>
                            <select id="transaction-status" name="transactionStatus" style="border-color: #fff !important;" class="custom-select selectr-hidden" placeholder="Status" tabindex="-1" aria-hidden="true">
                                <option value="ALL" selected="">All</option>
                                <option value="PROCESSING">Processing</option>
                                <option value="PROCESSED">Successful</option>
                                <option value="PENDING">Pending</option>
                                <option value="DECLINED">Declined</option>
                                <option value="FAILED">Failed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for=""></label>
                        <input id="transactionSearch" class="form-control" style="border-color: #fff !important;" placeholder="Search">
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-12">
                <div class="">
                    <p class="mb-0" style="font-weight:500">Download</p>
                    <button class="btn btn-light" id="custom_pdf_export"><i class="far fa-file-pdf text-danger me-2"></i> PDF</button>
                    <button class="btn btn-light" id="custom_excel_export"><i class="far fa-file-excel text-success me-2"></i> Excel</button>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="all-product-report_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="transactions-table" class="table table-striped dataTable no-footer" aria-describedby="all-product-report_info" style="width: 1245px;">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report" style="">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report" style="">Transaction</th>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report"  style="">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report" style="">Account Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report" style="">Reason</th>
                                                    <th class="sorting" tabindex="0" aria-controls="all-product-report" style="">Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <div id="all-product-report_processing" class="dataTables_processing card" style="display: none;">
                                            <div class="d-flex align-items-center justify-content-center" style="width:100%;height:100%;">
                                                <div class="spinner-border text-primary" role="status"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="all-product-report_info" role="status" aria-live="polite"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_full_numbers" id="all-product-report_paginate"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</main>
<!--/MAIN CONTENT-->

<!-- footer -->
<?php include './includes/footer.inc.php'; ?>
<!--/footer-->