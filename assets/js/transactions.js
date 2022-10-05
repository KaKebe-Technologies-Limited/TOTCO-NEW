"use strict";
// Class definition


const numberWithCommas = (x) => {
    x = Math.round(x);
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};
const TransactionsReportDatatable = function () {
    var date = new Date();
    const urlParams = new URLSearchParams(window.location.search);
    function toTitleCase(str) {
        return str.replace(
            /\w\S*/g,
            function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }

    // Private functions
    new Selectr('#transactionStatus');
    new Selectr('#productCategory');

    // demo initializer
    const transactions = function () {

        document.getElementById('start_date').value = moment().subtract(29, 'days').format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');
        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";

        $('.fa-calendar-alt').on('click', function () {
            $('[name="DateRage"]').focus();
        });

        let datatable = $('#all-product-report').DataTable({
            responsive: false,
            lengthChange: false,
            processing: true,
            searching: true,
            padding: true,
            pagingType: 'full_numbers',
            language: {
                processing: '<div class="d-flex align-items-center justify-content-center" style="width:100%;height:100%;"><div class="spinner-border text-primary" role="status"></div></div>',
                emptyTable: "No transactions available at the moment",
                paginate: {
                    first: '<i class="fas fa-angle-double-left">',
                    last: '<i class="fas fa-angle-double-right">',
                    next: '<i class="fas fa-angle-right">',
                    previous: '<i class="fas fa-angle-left">'
                }
            },
            serverSide: true,

            ajax: {
                url: `/interim/transactionReports?startdate=${moment().subtract(29, 'days').format('YYYY-MM-DD')}&enddate=${moment().format('YYYY-MM-DD')}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`,
                method: 'post',
            },
            //order: [[1, "desc"]],
            columns: [
                { data: "transactionId" },
                { data: "transactionTime" },
                { data: "productCode" },
                { data: "customerId" },
                { data: "fullName" },
                { data: "productId" },
                { data: "amount" },
                { data: "transactionStatus" },
            ],
            columnDefs: [
                {
                    targets: -1,
                    title: 'Action',
                    render: function (data, type, full, meta) {
                        var interimText = '';
                        if (full.type == "MOBILEMONEYPAYOUT" ||
                            full.type == "AIRTIME" ||
                            full.type == "DATA" ||
                            full.type == "BANKTRANSFERS" ||
                            full.type == "ACCOUNTTRANSFER") {
                            interimText =
                                `<div class="dropdown-divider"></div>
                                <a class="dropdown-item recycle" href="javascript:void(0)" title="Send again" txn-type-recycle="${full.type}" data-view-record-id="${full.id}">
                                    <i class="ti ti-refresh me-2"></i> Send again
                                </a>`;
                        }

                        var more = `
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-dark view" href="javascript:void(0)" title="View Details" data-view-record-id="${full.id}"><i class="ti ti-eye-check me-2"></i> View details</a>
                                ${interimText}
                            </div>`;
                        return more;
                    }
                },
                {
                    targets: -2,
                    title: 'Status',
                    width: '150px',
                    render: function (data, type, full, meta) {
                        var status = {
                            'COMMITTED': { 'title': 'Successful', 'class': 'text-success' },
                            'PROCESSED': { 'title': 'Successful', 'class': 'text-success' },
                            'PROCESSING': { 'title': 'Processing', 'class': 'text-warning' },
                            'PENDING': { 'title': 'Pending Approval', 'class': 'text-secondary' },
                            'FAILED': { 'title': 'Failed', 'class': 'text-danger' },
                            'DECLINED': { 'title': 'Declined', 'class': 'text-danger' },
                            'EXPIRED': { 'title': 'Expired', 'class': 'text-danger' },
                        };

                        if (typeof status[full.transactionStatus] === 'undefined') {
                            return status[full.transactionStatus];
                        }

                        return `<span data-view-record-id="${full.id}" class="d-flex align-items-center"><i class="fas fa-circle me-1 ${status[full.transactionStatus].class}" style="font-size: 9px;"></i><span class="font-12 text-muted">${status[full.transactionStatus].title}</span></span>`;

                    }
                },
                {
                    targets: -3,
                    title: 'Amount',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${numberWithCommas(full.amount)}<small class="text-muted font-10">UGX</small></span>`;

                    },
                },
                {
                    targets: -4,
                    title: 'Reason',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.reason}</span>`;

                    },
                },
                {
                    targets: -5,
                    title: 'Account Number',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.customerId}</span>`;

                    },
                },
                {
                    targets: -6,
                    title: 'Name',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.fullName}</span>`

                    },
                },
                {
                    targets: -7,
                    title: 'Transaction',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.productId}</span>`;

                    },
                },
                {
                    targets: -8,
                    title: 'Date',
                    width: '130px',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${moment(full.transactionTime).format('Do MMM YYYY')} <small class="text-muted font-10">${moment(full.transactionTime).format('hh:mm A')}</small></span>`

                    },
                },
            ],
        });

        // search table
        $('#transactionSearch').on('keyup change', function () {
            datatable.search(this.value).draw();
        });

        datatable.on('click', '.recycle', e => {
            const offcanvas = document.getElementById('view-transaction');
            const bsOffcanvas = new bootstrap.Offcanvas(offcanvas);
            bsOffcanvas.show();

            offcanvas.innerHTML = `<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                                 <div class="spinner-border  thumb-md text-primary" role="status"></div>
                               </div`;

            var id = e.currentTarget.getAttribute('data-view-record-id');

            var type = e.currentTarget.getAttribute('txn-type-recycle');

            var url = '';
            var q = '';

            if (type == 'MOBILEMONEYPAYOUT' || type == 'AIRTIME') {
                url = 'UpdateAirtimeMMTxn';
                q = type == 'MOBILEMONEYPAYOUT' ? '/quicksend/sendmm' : '/quicksend/sendairtime';
            }

            if (type == 'DATA') {
                url = 'UpdateInternet';
                q = '/quicksend/senddata';
            }

            if (type == 'ACCOUNTTRANSFER') {
                url = 'UpdateAccountTransfer';
                q = '/quicksend/transferToAccount';
            }

            if (type == 'BANKTRANSFERS') {
                url = 'UpdateBankTransfer';
                q = '/quicksend/transferToBank';
            }

            fetch(`/partials/${url}/${id}?q=${q}`)
                .then(async response => {
                    const isJson = response.headers.get('content-type')?.includes('application/json');
                    const data = isJson ? await response.json() : null;

                    if (!response.ok) {
                        const error = (data) || response.status;
                        console.log(error);
                        return Promise.reject(error);
                    }

                    return response.text();

                })
                .then(response => {

                    offcanvas.innerHTML = response;

                    if (type == 'DATA') {
                        const data_selector = new Selectr('#data');
                        buildNumber(type, data_selector);
                        loadDataBundles(data_selector);
                    }
                    else if (type == 'MOBILEMONEYPAYOUT' || type == 'AIRTIME') {
                        buildNumber(type, null);
                    }
                    else if (type == 'ACCOUNTTRANSFER') {
                        buildSelector();
                    }
                    else if (type == 'BANKTRANSFERS') {
                        new Selectr('#supported_banks');
                    }
                    checknumber(type);
                    reasonType();
                    amountFormatting();
                    update();

                })
                .catch(err => {

                    if (typeof err === 'object') {
                        showToast('warning', err.message);
                        return;
                    }

                    showToast('error', 'Process failed, try again');
                });


        })
        datatable.on('click', 'tbody tr td:not(:last-child),.view', (e) => {
            e.preventDefault();
            const currentElement = e.currentTarget.querySelector('[data-view-record-id]');
            const offcanvas = document.getElementById('view-transaction');
            const bsOffcanvas = new bootstrap.Offcanvas(offcanvas);
            bsOffcanvas.show();

            offcanvas.innerHTML = `<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                                 <div class="spinner-border  thumb-md text-primary" role="status"></div>
                               </div`;


            let transactionId = currentElement?.getAttribute('data-view-record-id') ?? e.currentTarget.getAttribute('data-view-record-id');
            fetch(`/transactions/ViewTransaction/${transactionId}`).then((response) => response.text()).then((data) => {

                offcanvas.innerHTML = data;

                simpleActions();

                doanloadProof();
                uploadDocs(transactionId);

            });
        });

        $('input[name="DateRage"]').daterangepicker({
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            format: 'YYYY-MM-DD',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 6 Month': [moment().subtract(6, 'month'), moment()]
            }
        }, function (start, end, label) {
            document.getElementById('start_date').value = start.format('YYYY-MM-DD');
            document.getElementById('end_date').value = end.format('YYYY-MM-DD');

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start.format('YYYY-MM-DD')}&enddate=${end.format('YYYY-MM-DD')}&status=${transactionStatusElement.value}&product=${productCategoryElement.value ?? "ALL"}`).load();

        });

        transactionStatusElement.addEventListener('change', function (event) {
            event.preventDefault();

            const status = event.currentTarget.value;
            const start = document.getElementById('start_date').value;
            const end = document.getElementById('end_date').value;
            const product = productCategoryElement.value ?? "ALL";

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start}&enddate=${end}&status=${status}&product=${product}`).load();
        });

        productCategoryElement.addEventListener('change', function (event) {
            event.preventDefault();

            const product = event.currentTarget.value;
            const start = document.getElementById('start_date').value;
            const end = document.getElementById('end_date').value;
            const status = transactionStatusElement.value ?? "ALL";

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start}&enddate=${end}&status=${status}&product=${product}`).load();
        });

    }
    // demo initializer
    const exportExcel = function () {
        document.getElementById('start_date').value = moment().subtract(29, 'days').format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');

        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";



        var btn = document.getElementById('custom_excel_export');

        btn.addEventListener('click', e => {

            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;

            var text = btn.innerHTML;
            btn.innerHTML = `exporting <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
            btn.setAttribute('disabled', 'disabled');
            var form = document.statementForm;
            fetch(`${window.location.origin}/transactions/transactionExcelExport?startdate=${startDate}&enddate=${endDate}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`)
                .then(response => response.json())
                .then(result => {
                    btn.innerHTML = text;
                    btn.removeAttribute('disabled');

                    showToast('success', result.message);

                })
                .catch(err => {
                    showToast('warning', 'Export has failed, please contact support');
                    btn.removeAttribute('disabled');
                    btn.innerHTML = text;

                });
        })

    }

    const exportPdf = function () {
        document.getElementById('start_date').value = moment().subtract('days', 29).format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');

        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";

        var btn = document.getElementById('custom_pdf_export');
        btn.addEventListener('click', e => {
            var text = btn.innerHTML;
            btn.innerHTML = `exporting <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
            btn.setAttribute('disabled', 'disabled');
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;

            fetch(`${window.location.origin}/transactions/transactionExportPDf?startdate=${startDate}&enddate=${endDate}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`)
                .then(response => response.json())
                .then(result => {
                    btn.innerHTML = text;
                    btn.removeAttribute('disabled');
                    showToast('success', result.message);
                })
                .catch(err => {
                    console.log(err);
                    showToast('warning', 'Export has failed, please contact support');
                    btn.removeAttribute('disabled');
                    btn.innerHTML = text;
                })

        })

    }

    const simpleActions = function () {
        var show_support_docs = document.getElementById('show_support_docs');
        if (show_support_docs) {

            var support_doc_div = document.getElementById('support_doc_div');

            show_support_docs.addEventListener('click', e => {
                e.preventDefault();

                support_doc_div.removeAttribute('hidden');
            })
        }
    }

    const uploadDocs = (id) => {

        let supportDocFile = {}

        var supportDocsUppy = new Uppy.Core({
            debug: false,
            autoProceed: false,
            restrictions: {
                maxNumberOfFiles: 5,
                minNumberOfFiles: 1
            }
        }).use(Uppy.Dashboard, {
            inline: true,
            target: '#support-docs',
            width: 350,
            height: 250,
            showProgressDetails: false,
            hideUploadButton: false,
            metaFields: [
                { id: 'note', name: 'note', placeholder: 'Provide a note' },
            ],
            locale: {
                strings: {
                    dropPaste: 'Drag and drop files here or %{browse}',
                }
            }
        }).use(Uppy.XHRUpload, {
            endpoint: `/interim/AddTxnAttachment?txnId=${id}`,
            method: 'post',
            formData: true,
            fieldName: 'file'
        });
        supportDocsUppy.on('upload-success', (file, response) => {
            const httpStatus = response.status // HTTP status code
            const httpBody = response.body   // extracted response data
            console.log({ response });

            if (response.body.code === -1) {
                showToast('warning', response.body.message);
                return;
            }

            let container = document.getElementById('attachment_container');

            container.insertAdjacentHTML('afterbegin', attachmentTemplate(response.body.data));
            supportDocsUppy.reset();
        });


        //.use(Uppy.Tus, { endpoint: 'https://master.tus.io/files/' })
        //.use(Uppy.ProgressBar, {
        //    target: '.UppyProgressBar',
        //    hideAfterFinish: false,
        //})
    }

    return {
        // Public functions
        init: () => {
            // init dmeo
            transactions();
            exportExcel();
            exportPdf();
        },
    };
}();

$(document).ready(function () {
    if (document.getElementById('all-product-report') != null) {
        TransactionsReportDatatable.init();
    }

});

function doanloadProof() {
    var download_proof = document.getElementById('download_proof');
    if (download_proof) {
        download_proof.addEventListener('click', e => {
            e.preventDefault();
            var id = download_proof.getAttribute('data-id');

            var originalHtml = download_proof.innerHTML;
            download_proof.innerHTML = 'Downloading <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(`download/${id}?downloadProof=true`)
                .then(response => response.json())
                .then(result => {
                    if (result.code == -1) {
                        showToast('warning', result.message);
                        return;
                    }
                    showToast('success', result.message);
                    download_proof.innerHTML = originalHtml;
                })
                .catch(err => {
                    console.log(err);
                    showToast('error', 'Failed to download');
                    download_proof.innerHTML = originalHtml;
                })
        });
    }
}

function deleteAttachment(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        text: "Do you want to delete this attachment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true, preConfirm: (login) => {
            return fetch(`${window.location.origin}/attachments/delete/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        console.log({ result });
        if (result.value) {

            if (result.code == 0) {
                setInterval(() => {
                    window.location.reload(true);
                }, 4000);
            }

            swalWithBootstrapButtons.fire(
                result.value.code == -1 ? 'Failed' : 'Deleted!',
                result.value.message,
                result.value.code == -1 ? 'error' : 'success'
            );



        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            console.log("reverted attachment deletion");
        }
    })
}

function attachmentTemplate(attachment) {


    var iconTi = "ti ti-files-off text-secondary";
    if (attachment.contentType == "image/png" ||
        attachment.contentType == "image/jpeg" ||
        attachment.contentType == "image/jpg") {
        iconTi = "far fa-file-image text-info";
    }
    if (attachment.contentType == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
        iconTi = "far fa-file-excel text-success";
    }
    if (attachment.contentType == "text/plain") {
        iconTi = "far fa-file-alt text-info";
    }
    if (attachment.contentType == "application/pdf") {
        iconTi = "far fa-file-pdf text-danger";
    }

    var size = attachment.FileSize / 1024;

    let d = `
    <div class="file-box" style="width:48%;" title="${attachment.fileName}">
        <a href="${attachment.filePath}" class="download-icon-link">
            <i class="las la-download file-download-icon"></i>
        </a>
        <a href="javascript:deleteAttachment('${attachment.Id}')" class="download-icon-link">
            <i class="las la-download file-download-icon"></i>
        </a>
        <div class="text-center">
            <i class="${iconTi}"></i>
            <h6 class="text-truncate">${attachment.fileName}</h6>
            <small class="text-muted">${attachment.createdOn} / ${size.toFixed(2)}MB</small>
        </div>
    </div>`;

    return d;
}
function buildSelector() {
    if (document.getElementsByClassName('js-data-example-ajax').length) {
        $('.js-data-example-ajax').select2({
            ajax: {
                url: window.location.origin + '/accounttransfers/SearchAccounts',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        name: params.term,
                        type: 'public'
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    console.log({ data });
                    return {
                        results: data
                    };
                }
            },
            placeholder: 'Search for an account',
            minimumInputLength: 4,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });
    }

    function formatRepo(account) {

        if (account.loading) {
            return account.text;
        }

        var $container = $(`<label class='font-13 text-black'>${account.text}</label>`);

        return $container;
    }
    function formatRepoSelection(account) {
        //console.log({ account });
        return account.text;
    }
}
function reasonType() {
    const reason = document.getElementById('reason');

    if (reason) {
        countWord(reason);

        reason.addEventListener('input', e => {
            countWord(e);
        });

        reason.addEventListener('paste', e => {
            countWord(e);
        });

        reason.addEventListener('keydown', e => {
            if (e.keyCode == 8 || e.keyCode == 46) {
                countWord(e);
            }
        });

        function countWord(e) {
            var maxCount = '140';
            if (!reason.value) {
                document.getElementById('check_length').innerHTML = 0 + '/' + maxCount;
            } else {
                //var words = reason.value.match(/\S+/g);
                var words = reason.value;
                if (reason.value.length > 140) {
                    //e.preventDefault();
                    showToast('warning', 'Exceeded maximum length of 140');
                }
                document.getElementById('check_length').innerHTML = words.length + '/' + maxCount;
            }


        }
    }


}
function amountFormatting() {
    const amount = document.getElementById('amount');

    if (amount) {
        amount.addEventListener('keyup', (event) => {
            // skip for arrow keys
            if (event.which <= 40 && event.which != 8) return;
            //if (event.which >= 37 && event.which <= 40) return;
            // format number

            var num = amount.value.substr(amount.value.length - 1);

            if (isNaN(num) && num !== ',') {
                showToast('error', 'Only numbers are accepted');
                return;
            }
            num = amount.value.replace(/,/g, "");
            amount.value = numberWithCommas(num);
        });
    }

}
function checknumber(type) {
    const number = document.getElementById('number');
    if (number) {

        number.addEventListener('keyup', (event) => {
            // skip for arrow keys
            if (event.which <= 40 && event.which != 8)  return;

            if (isNaN(number.value)) {
                showToast('error', 'Only numbers are accepted');
                return;
            }
            if (type === 'MOBILEMONEYPAYOUT') {
                checkName(number.value);
            }
        });
    }
}
function checkName(number) {
    if (number.length >= 9) {
        document.getElementById('nameHelp').innerHTML = 'Loading name...';
        var name = document.getElementById('name');
        fetch(`/quicksend/checkNumber?number=${number}`)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if (result.code == -1) {
                    name.value = '';
                    document.getElementById('nameHelp').innerHTML = 'only MTN numbers can be validated.';
                    return;
                }
                name.value = result.data;
                document.getElementById('nameHelp').innerHTML = 'Found';
            })
            .catch(err => {
                name.value = '';
                document.getElementById('nameHelp').innerHTML = 'only MTN numbers can be validated.';
            });
    }
}
function buildNumber(type, data_selector) {
    var number = document.getElementById('number');

    window.intlTelInput(number, {
        initialCountry: "UG",
        onlyCountries: ["UG"],
        nationalMode: true,
        separateDialCode: true,
    });
    number.addEventListener('keyup', (event) => {
        numberVal(type, data_selector);
    });
    number.addEventListener('paste', (event) => {
        numberVal(type, data_selector);
    });
}
function loadDataBundles(data_selector) {
    var number = document.getElementById('number');

    var data_loading_spinner = document.getElementById('data-loading-spinner');
    const data = document.getElementById('data');
    data_loading_spinner.classList.remove('d-none');

    data.innerHTML = `<option selected>Loading bundles</option>`;
    fetch(`${window.location.origin}/quicksend/loaddatabundles?number=${number.value}`, {
        method: 'get',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer"
    })
        .then((response) => {
            if (response.ok) {
                return response.json()
            } else {
                data_loading_spinner.classList.add('d-none');
                return Promise.reject({
                    status: response.status,
                    statusText: response.statusText
                });
            }
        })
        .then((result) => {
            data_selector.removeAll();
            data.removeAttribute('disabled');

            if (result.code === -1) {
                data_loading_spinner.classList.add('d-none');
                data.innerHTML = `<option selected>No Data Bundles Available for ${number.value}</option>`;
                return;
            }
            data_selector.removeAll()
            let options = [];
            result.data.forEach((element, position) => {
                var _bundles = element.Value;
                _bundles.forEach((bundleData, index) => {

                    var vendor = '';
                    if (bundleData.vendor === 'AFRICELLDATABUNDLESUG') {
                        vendor = 'Africell';
                    } else if (bundleData.vendor === 'SMARTDATABUNDLESUG') {
                        vendor = 'Smart';
                    } else if (bundleData.vendor === 'SMILEDATABUNDLESUG') {
                        vendor = 'Smile';
                    } else if (bundleData.vendor === 'MTNDATABUNDLESUG') {
                        vendor = 'Mtn';
                    } else if (bundleData.vendor === 'AIRTELDATABUNDLESUG') {
                        vendor = 'Airtel';
                    }

                    options.push({
                        value: bundleData.productRef,
                        text: `${bundleData.name} at UGX ${bundleData.amount}: on ${vendor}`
                    });
                });


            });
            data_selector.add(options);
            data_loading_spinner.classList.add('d-none');

        })
        .catch(err => {
            data_loading_spinner.classList.add('d-none');
            console.log(err);
            showAlertMessage(err.statusText, 'danger');
        });
}
function numberVal(type, data_selector) {
    if (event.which <= 40 && event.which != 8)  return;

    var num = number.value;
    if (isNaN(num)) {
        $('#val-number').html('Only numbers are accepted');
        showToast('error', 'Only numbers are accepted');
        return;
    }

    if (num.startsWith('0')) {
        num = num.substr(1);
    }

    if (num.length === 6) {
        let str = num.replace(/\s/g, '');
        if (str.startsWith('709') || str.startsWith('711')) {
            if (str.length < 6 || str.length > 6) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }

    if (num.length === 9) {
        let str = num.replace(/\s/g, '');
        if (str.startsWith('7') || str.startsWith('3') || str.startsWith('6')) {
            if (str.length < 9 || str.length > 9) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }

    if (num.length === 10) {
        var str = num.replace(/\s/g, '');
        if (str.startsWith('1') || str.startsWith('2')) {
            if (str.length < 10 || str.length > 10) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }
}
function update() {
    var updateTxnBtn = document.getElementById('update-txn-form-btn');

    if (updateTxnBtn) {
        var form = document.getElementById('form');
        console.log(form);
        form.addEventListener('submit', e => {
            e.preventDefault();

            var originalHtml = updateTxnBtn.innerHTML;

            updateTxnBtn.innerHTML = 'Sending &nbsp; <span class="spinner-border spinner-border-sm" role="status"></span>';
            updateTxnBtn.setAttribute('disabled', 'disabled');

            var formData = new FormData(form);

            var url = form.getAttribute('action');
            console.log(url);
            fetch(url, {
                method: 'post',
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    if (result.code == -1) {
                        updateTxnBtn.innerHTML = originalHtml;
                        updateTxnBtn.removeAttribute('disabled');
                        showToast('warning', result.message);
                        return;
                    }
                    showToast('success', result.message);

                    setInterval(() => {
                        window.location.href = window.location.origin + '/transactions/report';
                    }, 3000);
                })
                .catch(err => {
                    updateTxnBtn.innerHTML = originalHtml;
                    updateTxnBtn.removeAttribute('disabled');
                    console.log(err);
                    showToast('error', 'Process failed');
                })
        });
    }
}"use strict";
// Class definition


const numberWithCommas = (x) => {
    x = Math.round(x);
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};
const TransactionsReportDatatable = function () {
    var date = new Date();
    const urlParams = new URLSearchParams(window.location.search);
    function toTitleCase(str) {
        return str.replace(
            /\w\S*/g,
            function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }

    // Private functions
    new Selectr('#transactionStatus');
    new Selectr('#productCategory');

    // demo initializer
    const transactions = function () {

        document.getElementById('start_date').value = moment().subtract(29, 'days').format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');
        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";

        $('.fa-calendar-alt').on('click', function () {
            $('[name="DateRage"]').focus();
        });

        let datatable = $('#all-product-report').DataTable({
            responsive: false,
            lengthChange: false,
            processing: true,
            searching: true,
            padding: true,
            pagingType: 'full_numbers',
            language: {
                processing: '<div class="d-flex align-items-center justify-content-center" style="width:100%;height:100%;"><div class="spinner-border text-primary" role="status"></div></div>',
                emptyTable: "No transactions available at the moment",
                paginate: {
                    first: '<i class="fas fa-angle-double-left">',
                    last: '<i class="fas fa-angle-double-right">',
                    next: '<i class="fas fa-angle-right">',
                    previous: '<i class="fas fa-angle-left">'
                }
            },
            serverSide: true,

            ajax: {
                url: `/interim/transactionReports?startdate=${moment().subtract(29, 'days').format('YYYY-MM-DD')}&enddate=${moment().format('YYYY-MM-DD')}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`,
                method: 'post',
            },
            //order: [[1, "desc"]],
            columns: [
                { data: "transactionId" },
                { data: "transactionTime" },
                { data: "productCode" },
                { data: "customerId" },
                { data: "fullName" },
                { data: "productId" },
                { data: "amount" },
                { data: "transactionStatus" },
            ],
            columnDefs: [
                {
                    targets: -1,
                    title: 'Action',
                    render: function (data, type, full, meta) {
                        var interimText = '';
                        if (full.type == "MOBILEMONEYPAYOUT" ||
                            full.type == "AIRTIME" ||
                            full.type == "DATA" ||
                            full.type == "BANKTRANSFERS" ||
                            full.type == "ACCOUNTTRANSFER") {
                            interimText =
                                `<div class="dropdown-divider"></div>
                                <a class="dropdown-item recycle" href="javascript:void(0)" title="Send again" txn-type-recycle="${full.type}" data-view-record-id="${full.id}">
                                    <i class="ti ti-refresh me-2"></i> Send again
                                </a>`;
                        }

                        var more = `
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-dark view" href="javascript:void(0)" title="View Details" data-view-record-id="${full.id}"><i class="ti ti-eye-check me-2"></i> View details</a>
                                ${interimText}
                            </div>`;
                        return more;
                    }
                },
                {
                    targets: -2,
                    title: 'Status',
                    width: '150px',
                    render: function (data, type, full, meta) {
                        var status = {
                            'COMMITTED': { 'title': 'Successful', 'class': 'text-success' },
                            'PROCESSED': { 'title': 'Successful', 'class': 'text-success' },
                            'PROCESSING': { 'title': 'Processing', 'class': 'text-warning' },
                            'PENDING': { 'title': 'Pending Approval', 'class': 'text-secondary' },
                            'FAILED': { 'title': 'Failed', 'class': 'text-danger' },
                            'DECLINED': { 'title': 'Declined', 'class': 'text-danger' },
                            'EXPIRED': { 'title': 'Expired', 'class': 'text-danger' },
                        };

                        if (typeof status[full.transactionStatus] === 'undefined') {
                            return status[full.transactionStatus];
                        }

                        return `<span data-view-record-id="${full.id}" class="d-flex align-items-center"><i class="fas fa-circle me-1 ${status[full.transactionStatus].class}" style="font-size: 9px;"></i><span class="font-12 text-muted">${status[full.transactionStatus].title}</span></span>`;

                    }
                },
                {
                    targets: -3,
                    title: 'Amount',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${numberWithCommas(full.amount)}<small class="text-muted font-10">UGX</small></span>`;

                    },
                },
                {
                    targets: -4,
                    title: 'Reason',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.reason}</span>`;

                    },
                },
                {
                    targets: -5,
                    title: 'Account Number',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.customerId}</span>`;

                    },
                },
                {
                    targets: -6,
                    title: 'Name',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.fullName}</span>`

                    },
                },
                {
                    targets: -7,
                    title: 'Transaction',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${full.productId}</span>`;

                    },
                },
                {
                    targets: -8,
                    title: 'Date',
                    width: '130px',
                    render: function (data, type, full, meta) {

                        return `<span data-view-record-id="${full.id}">${moment(full.transactionTime).format('Do MMM YYYY')} <small class="text-muted font-10">${moment(full.transactionTime).format('hh:mm A')}</small></span>`

                    },
                },
            ],
        });

        // search table
        $('#transactionSearch').on('keyup change', function () {
            datatable.search(this.value).draw();
        });

        datatable.on('click', '.recycle', e => {
            const offcanvas = document.getElementById('view-transaction');
            const bsOffcanvas = new bootstrap.Offcanvas(offcanvas);
            bsOffcanvas.show();

            offcanvas.innerHTML = `<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                                 <div class="spinner-border  thumb-md text-primary" role="status"></div>
                               </div`;

            var id = e.currentTarget.getAttribute('data-view-record-id');

            var type = e.currentTarget.getAttribute('txn-type-recycle');

            var url = '';
            var q = '';

            if (type == 'MOBILEMONEYPAYOUT' || type == 'AIRTIME') {
                url = 'UpdateAirtimeMMTxn';
                q = type == 'MOBILEMONEYPAYOUT' ? '/quicksend/sendmm' : '/quicksend/sendairtime';
            }

            if (type == 'DATA') {
                url = 'UpdateInternet';
                q = '/quicksend/senddata';
            }

            if (type == 'ACCOUNTTRANSFER') {
                url = 'UpdateAccountTransfer';
                q = '/quicksend/transferToAccount';
            }

            if (type == 'BANKTRANSFERS') {
                url = 'UpdateBankTransfer';
                q = '/quicksend/transferToBank';
            }

            fetch(`/partials/${url}/${id}?q=${q}`)
                .then(async response => {
                    const isJson = response.headers.get('content-type')?.includes('application/json');
                    const data = isJson ? await response.json() : null;

                    if (!response.ok) {
                        const error = (data) || response.status;
                        console.log(error);
                        return Promise.reject(error);
                    }

                    return response.text();

                })
                .then(response => {

                    offcanvas.innerHTML = response;

                    if (type == 'DATA') {
                        const data_selector = new Selectr('#data');
                        buildNumber(type, data_selector);
                        loadDataBundles(data_selector);
                    }
                    else if (type == 'MOBILEMONEYPAYOUT' || type == 'AIRTIME') {
                        buildNumber(type, null);
                    }
                    else if (type == 'ACCOUNTTRANSFER') {
                        buildSelector();
                    }
                    else if (type == 'BANKTRANSFERS') {
                        new Selectr('#supported_banks');
                    }
                    checknumber(type);
                    reasonType();
                    amountFormatting();
                    update();

                })
                .catch(err => {

                    if (typeof err === 'object') {
                        showToast('warning', err.message);
                        return;
                    }

                    showToast('error', 'Process failed, try again');
                });


        })
        datatable.on('click', 'tbody tr td:not(:last-child),.view', (e) => {
            e.preventDefault();
            const currentElement = e.currentTarget.querySelector('[data-view-record-id]');
            const offcanvas = document.getElementById('view-transaction');
            const bsOffcanvas = new bootstrap.Offcanvas(offcanvas);
            bsOffcanvas.show();

            offcanvas.innerHTML = `<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                                 <div class="spinner-border  thumb-md text-primary" role="status"></div>
                               </div`;


            let transactionId = currentElement?.getAttribute('data-view-record-id') ?? e.currentTarget.getAttribute('data-view-record-id');
            fetch(`/transactions/ViewTransaction/${transactionId}`).then((response) => response.text()).then((data) => {

                offcanvas.innerHTML = data;

                simpleActions();

                doanloadProof();
                uploadDocs(transactionId);

            });
        });

        $('input[name="DateRage"]').daterangepicker({
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            format: 'YYYY-MM-DD',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 6 Month': [moment().subtract(6, 'month'), moment()]
            }
        }, function (start, end, label) {
            document.getElementById('start_date').value = start.format('YYYY-MM-DD');
            document.getElementById('end_date').value = end.format('YYYY-MM-DD');

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start.format('YYYY-MM-DD')}&enddate=${end.format('YYYY-MM-DD')}&status=${transactionStatusElement.value}&product=${productCategoryElement.value ?? "ALL"}`).load();

        });

        transactionStatusElement.addEventListener('change', function (event) {
            event.preventDefault();

            const status = event.currentTarget.value;
            const start = document.getElementById('start_date').value;
            const end = document.getElementById('end_date').value;
            const product = productCategoryElement.value ?? "ALL";

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start}&enddate=${end}&status=${status}&product=${product}`).load();
        });

        productCategoryElement.addEventListener('change', function (event) {
            event.preventDefault();

            const product = event.currentTarget.value;
            const start = document.getElementById('start_date').value;
            const end = document.getElementById('end_date').value;
            const status = transactionStatusElement.value ?? "ALL";

            datatable.ajax.url(`/interim/TransactionReports?startdate=${start}&enddate=${end}&status=${status}&product=${product}`).load();
        });

    }
    // demo initializer
    const exportExcel = function () {
        document.getElementById('start_date').value = moment().subtract(29, 'days').format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');

        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";



        var btn = document.getElementById('custom_excel_export');

        btn.addEventListener('click', e => {

            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;

            var text = btn.innerHTML;
            btn.innerHTML = `exporting <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
            btn.setAttribute('disabled', 'disabled');
            var form = document.statementForm;
            fetch(`${window.location.origin}/transactions/transactionExcelExport?startdate=${startDate}&enddate=${endDate}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`)
                .then(response => response.json())
                .then(result => {
                    btn.innerHTML = text;
                    btn.removeAttribute('disabled');

                    showToast('success', result.message);

                })
                .catch(err => {
                    showToast('warning', 'Export has failed, please contact support');
                    btn.removeAttribute('disabled');
                    btn.innerHTML = text;

                });
        })

    }

    const exportPdf = function () {
        document.getElementById('start_date').value = moment().subtract('days', 29).format('YYYY-MM-DD');
        document.getElementById('end_date').value = moment().format('YYYY-MM-DD');

        const transactionStatusElement = document.getElementById('transactionStatus');
        const productCategoryElement = document.getElementById('productCategory');
        const businessId = urlParams.get('q') ?? "";

        var btn = document.getElementById('custom_pdf_export');
        btn.addEventListener('click', e => {
            var text = btn.innerHTML;
            btn.innerHTML = `exporting <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
            btn.setAttribute('disabled', 'disabled');
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;

            fetch(`${window.location.origin}/transactions/transactionExportPDf?startdate=${startDate}&enddate=${endDate}&status=${transactionStatusElement.value}&businessId=${businessId}&product=${productCategoryElement.value ?? "ALL"}`)
                .then(response => response.json())
                .then(result => {
                    btn.innerHTML = text;
                    btn.removeAttribute('disabled');
                    showToast('success', result.message);
                })
                .catch(err => {
                    console.log(err);
                    showToast('warning', 'Export has failed, please contact support');
                    btn.removeAttribute('disabled');
                    btn.innerHTML = text;
                })

        })

    }

    const simpleActions = function () {
        var show_support_docs = document.getElementById('show_support_docs');
        if (show_support_docs) {

            var support_doc_div = document.getElementById('support_doc_div');

            show_support_docs.addEventListener('click', e => {
                e.preventDefault();

                support_doc_div.removeAttribute('hidden');
            })
        }
    }

    const uploadDocs = (id) => {

        let supportDocFile = {}

        var supportDocsUppy = new Uppy.Core({
            debug: false,
            autoProceed: false,
            restrictions: {
                maxNumberOfFiles: 5,
                minNumberOfFiles: 1
            }
        }).use(Uppy.Dashboard, {
            inline: true,
            target: '#support-docs',
            width: 350,
            height: 250,
            showProgressDetails: false,
            hideUploadButton: false,
            metaFields: [
                { id: 'note', name: 'note', placeholder: 'Provide a note' },
            ],
            locale: {
                strings: {
                    dropPaste: 'Drag and drop files here or %{browse}',
                }
            }
        }).use(Uppy.XHRUpload, {
            endpoint: `/interim/AddTxnAttachment?txnId=${id}`,
            method: 'post',
            formData: true,
            fieldName: 'file'
        });
        supportDocsUppy.on('upload-success', (file, response) => {
            const httpStatus = response.status // HTTP status code
            const httpBody = response.body   // extracted response data
            console.log({ response });

            if (response.body.code === -1) {
                showToast('warning', response.body.message);
                return;
            }

            let container = document.getElementById('attachment_container');

            container.insertAdjacentHTML('afterbegin', attachmentTemplate(response.body.data));
            supportDocsUppy.reset();
        });


        //.use(Uppy.Tus, { endpoint: 'https://master.tus.io/files/' })
        //.use(Uppy.ProgressBar, {
        //    target: '.UppyProgressBar',
        //    hideAfterFinish: false,
        //})
    }

    return {
        // Public functions
        init: () => {
            // init dmeo
            transactions();
            exportExcel();
            exportPdf();
        },
    };
}();

$(document).ready(function () {
    if (document.getElementById('all-product-report') != null) {
        TransactionsReportDatatable.init();
    }

});

function doanloadProof() {
    var download_proof = document.getElementById('download_proof');
    if (download_proof) {
        download_proof.addEventListener('click', e => {
            e.preventDefault();
            var id = download_proof.getAttribute('data-id');

            var originalHtml = download_proof.innerHTML;
            download_proof.innerHTML = 'Downloading <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

            fetch(`download/${id}?downloadProof=true`)
                .then(response => response.json())
                .then(result => {
                    if (result.code == -1) {
                        showToast('warning', result.message);
                        return;
                    }
                    showToast('success', result.message);
                    download_proof.innerHTML = originalHtml;
                })
                .catch(err => {
                    console.log(err);
                    showToast('error', 'Failed to download');
                    download_proof.innerHTML = originalHtml;
                })
        });
    }
}

function deleteAttachment(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        text: "Do you want to delete this attachment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true, preConfirm: (login) => {
            return fetch(`${window.location.origin}/attachments/delete/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        console.log({ result });
        if (result.value) {

            if (result.code == 0) {
                setInterval(() => {
                    window.location.reload(true);
                }, 4000);
            }

            swalWithBootstrapButtons.fire(
                result.value.code == -1 ? 'Failed' : 'Deleted!',
                result.value.message,
                result.value.code == -1 ? 'error' : 'success'
            );



        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            console.log("reverted attachment deletion");
        }
    })
}

function attachmentTemplate(attachment) {


    var iconTi = "ti ti-files-off text-secondary";
    if (attachment.contentType == "image/png" ||
        attachment.contentType == "image/jpeg" ||
        attachment.contentType == "image/jpg") {
        iconTi = "far fa-file-image text-info";
    }
    if (attachment.contentType == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
        iconTi = "far fa-file-excel text-success";
    }
    if (attachment.contentType == "text/plain") {
        iconTi = "far fa-file-alt text-info";
    }
    if (attachment.contentType == "application/pdf") {
        iconTi = "far fa-file-pdf text-danger";
    }

    var size = attachment.FileSize / 1024;

    let d = `
    <div class="file-box" style="width:48%;" title="${attachment.fileName}">
        <a href="${attachment.filePath}" class="download-icon-link">
            <i class="las la-download file-download-icon"></i>
        </a>
        <a href="javascript:deleteAttachment('${attachment.Id}')" class="download-icon-link">
            <i class="las la-download file-download-icon"></i>
        </a>
        <div class="text-center">
            <i class="${iconTi}"></i>
            <h6 class="text-truncate">${attachment.fileName}</h6>
            <small class="text-muted">${attachment.createdOn} / ${size.toFixed(2)}MB</small>
        </div>
    </div>`;

    return d;
}
function buildSelector() {
    if (document.getElementsByClassName('js-data-example-ajax').length) {
        $('.js-data-example-ajax').select2({
            ajax: {
                url: window.location.origin + '/accounttransfers/SearchAccounts',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        name: params.term,
                        type: 'public'
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    console.log({ data });
                    return {
                        results: data
                    };
                }
            },
            placeholder: 'Search for an account',
            minimumInputLength: 4,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });
    }

    function formatRepo(account) {

        if (account.loading) {
            return account.text;
        }

        var $container = $(`<label class='font-13 text-black'>${account.text}</label>`);

        return $container;
    }
    function formatRepoSelection(account) {
        //console.log({ account });
        return account.text;
    }
}
function reasonType() {
    const reason = document.getElementById('reason');

    if (reason) {
        countWord(reason);

        reason.addEventListener('input', e => {
            countWord(e);
        });

        reason.addEventListener('paste', e => {
            countWord(e);
        });

        reason.addEventListener('keydown', e => {
            if (e.keyCode == 8 || e.keyCode == 46) {
                countWord(e);
            }
        });

        function countWord(e) {
            var maxCount = '140';
            if (!reason.value) {
                document.getElementById('check_length').innerHTML = 0 + '/' + maxCount;
            } else {
                //var words = reason.value.match(/\S+/g);
                var words = reason.value;
                if (reason.value.length > 140) {
                    //e.preventDefault();
                    showToast('warning', 'Exceeded maximum length of 140');
                }
                document.getElementById('check_length').innerHTML = words.length + '/' + maxCount;
            }


        }
    }


}
function amountFormatting() {
    const amount = document.getElementById('amount');

    if (amount) {
        amount.addEventListener('keyup', (event) => {
            // skip for arrow keys
            if (event.which <= 40 && event.which != 8) return;
            //if (event.which >= 37 && event.which <= 40) return;
            // format number

            var num = amount.value.substr(amount.value.length - 1);

            if (isNaN(num) && num !== ',') {
                showToast('error', 'Only numbers are accepted');
                return;
            }
            num = amount.value.replace(/,/g, "");
            amount.value = numberWithCommas(num);
        });
    }

}
function checknumber(type) {
    const number = document.getElementById('number');
    if (number) {

        number.addEventListener('keyup', (event) => {
            // skip for arrow keys
            if (event.which <= 40 && event.which != 8)  return;

            if (isNaN(number.value)) {
                showToast('error', 'Only numbers are accepted');
                return;
            }
            if (type === 'MOBILEMONEYPAYOUT') {
                checkName(number.value);
            }
        });
    }
}
function checkName(number) {
    if (number.length >= 9) {
        document.getElementById('nameHelp').innerHTML = 'Loading name...';
        var name = document.getElementById('name');
        fetch(`/quicksend/checkNumber?number=${number}`)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if (result.code == -1) {
                    name.value = '';
                    document.getElementById('nameHelp').innerHTML = 'only MTN numbers can be validated.';
                    return;
                }
                name.value = result.data;
                document.getElementById('nameHelp').innerHTML = 'Found';
            })
            .catch(err => {
                name.value = '';
                document.getElementById('nameHelp').innerHTML = 'only MTN numbers can be validated.';
            });
    }
}
function buildNumber(type, data_selector) {
    var number = document.getElementById('number');

    window.intlTelInput(number, {
        initialCountry: "UG",
        onlyCountries: ["UG"],
        nationalMode: true,
        separateDialCode: true,
    });
    number.addEventListener('keyup', (event) => {
        numberVal(type, data_selector);
    });
    number.addEventListener('paste', (event) => {
        numberVal(type, data_selector);
    });
}
function loadDataBundles(data_selector) {
    var number = document.getElementById('number');

    var data_loading_spinner = document.getElementById('data-loading-spinner');
    const data = document.getElementById('data');
    data_loading_spinner.classList.remove('d-none');

    data.innerHTML = `<option selected>Loading bundles</option>`;
    fetch(`${window.location.origin}/quicksend/loaddatabundles?number=${number.value}`, {
        method: 'get',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer"
    })
        .then((response) => {
            if (response.ok) {
                return response.json()
            } else {
                data_loading_spinner.classList.add('d-none');
                return Promise.reject({
                    status: response.status,
                    statusText: response.statusText
                });
            }
        })
        .then((result) => {
            data_selector.removeAll();
            data.removeAttribute('disabled');

            if (result.code === -1) {
                data_loading_spinner.classList.add('d-none');
                data.innerHTML = `<option selected>No Data Bundles Available for ${number.value}</option>`;
                return;
            }
            data_selector.removeAll()
            let options = [];
            result.data.forEach((element, position) => {
                var _bundles = element.Value;
                _bundles.forEach((bundleData, index) => {

                    var vendor = '';
                    if (bundleData.vendor === 'AFRICELLDATABUNDLESUG') {
                        vendor = 'Africell';
                    } else if (bundleData.vendor === 'SMARTDATABUNDLESUG') {
                        vendor = 'Smart';
                    } else if (bundleData.vendor === 'SMILEDATABUNDLESUG') {
                        vendor = 'Smile';
                    } else if (bundleData.vendor === 'MTNDATABUNDLESUG') {
                        vendor = 'Mtn';
                    } else if (bundleData.vendor === 'AIRTELDATABUNDLESUG') {
                        vendor = 'Airtel';
                    }

                    options.push({
                        value: bundleData.productRef,
                        text: `${bundleData.name} at UGX ${bundleData.amount}: on ${vendor}`
                    });
                });


            });
            data_selector.add(options);
            data_loading_spinner.classList.add('d-none');

        })
        .catch(err => {
            data_loading_spinner.classList.add('d-none');
            console.log(err);
            showAlertMessage(err.statusText, 'danger');
        });
}
function numberVal(type, data_selector) {
    if (event.which <= 40 && event.which != 8)  return;

    var num = number.value;
    if (isNaN(num)) {
        $('#val-number').html('Only numbers are accepted');
        showToast('error', 'Only numbers are accepted');
        return;
    }

    if (num.startsWith('0')) {
        num = num.substr(1);
    }

    if (num.length === 6) {
        let str = num.replace(/\s/g, '');
        if (str.startsWith('709') || str.startsWith('711')) {
            if (str.length < 6 || str.length > 6) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }

    if (num.length === 9) {
        let str = num.replace(/\s/g, '');
        if (str.startsWith('7') || str.startsWith('3') || str.startsWith('6')) {
            if (str.length < 9 || str.length > 9) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }

    if (num.length === 10) {
        var str = num.replace(/\s/g, '');
        if (str.startsWith('1') || str.startsWith('2')) {
            if (str.length < 10 || str.length > 10) {
                showToast('error', "Number length is incorrect");
                return;
            }
            if (type == 'DATA') {
                loadDataBundles(data_selector);
            }
        }
    }
}
function update() {
    var updateTxnBtn = document.getElementById('update-txn-form-btn');

    if (updateTxnBtn) {
        var form = document.getElementById('form');
        console.log(form);
        form.addEventListener('submit', e => {
            e.preventDefault();

            var originalHtml = updateTxnBtn.innerHTML;

            updateTxnBtn.innerHTML = 'Sending &nbsp; <span class="spinner-border spinner-border-sm" role="status"></span>';
            updateTxnBtn.setAttribute('disabled', 'disabled');

            var formData = new FormData(form);

            var url = form.getAttribute('action');
            console.log(url);
            fetch(url, {
                method: 'post',
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    if (result.code == -1) {
                        updateTxnBtn.innerHTML = originalHtml;
                        updateTxnBtn.removeAttribute('disabled');
                        showToast('warning', result.message);
                        return;
                    }
                    showToast('success', result.message);

                    setInterval(() => {
                        window.location.href = window.location.origin + '/transactions/report';
                    }, 3000);
                })
                .catch(err => {
                    updateTxnBtn.innerHTML = originalHtml;
                    updateTxnBtn.removeAttribute('disabled');
                    console.log(err);
                    showToast('error', 'Process failed');
                })
        });
    }
}