// Delete sales order

function deleteOrder(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        text: "Do you want to delete this sales order?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true, preConfirm: () => {
            return fetch(`https://totco.kakebe.com/api/api/sales_orders/deleteSalesOrder.php?id=${id}`)
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
            result.dismiss === Swal.DismissReason.cancel
        ) {
            console.log("reverted sales order deletion");
        }
    })
}

function salessalesdata() {
    let datatable;

    var xmlhttp = new XMLHttpRequest();
    var url = "https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php";
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && xmlhttp.status == 200) {
            var dataset = JSON.parse(xmlhttp.responseText);
            //console.log(data);
            datatable = $('#order-table').DataTable({

                language: {
                    processing: '<div class="d-flex align-items-center justify-content-center" style="width:100%;height:100%;"><div class="spinner-border text-primary" role="status"></div></div>',
                    emptyTable: "No sales orders available at the moment",
                },

                "data": dataset.orders,
                columns: [
                    {
                        data: 'order_status.sales_order_id',
                        'select': 'multi',
                        'orderable': false,
                        'render': function(data, type, row, meta){
                            if(type === 'display'){
                                data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                            }

                            return data;
                        },
                        'checkboxes': {
                            'selectRow': true,
                            'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                        },
                    },

                    { data: 'order_status.sales_order_id'},
                    { data: 'order_items[0].pdt_name'},
                    { data: 'order_items[0].quantity'},
                    { data: 'order_items[0].selling_price'},
                    { data: 'order_status.createdAt'},
                    { data: 'order_status.Agent_Name'},
                    {
                        data: 'order_status.isPending',
                        width: '150px',
                        render: function(data, type, full, meta) {
                            return `
                                ${full.order_status.isPending == 1 ? '<div class="badge badge-primary">Pending</div>'
                                    : (full.order_status.isApproved == 1 ? '<div class="badge badge-success">Approved</div>'
                                        : '<div class="badge badge-success">Rejected</div>')
                                }
                                `;
                        }
                    },
                    {
                        data: 'order_status.sales_order_id',
                        render: function(data, type, full, meta){
                            if(type === 'display'){
                                data =  `
                                <a title="View sales order" class="btn btn-primary mx-1" href="single-order?id=${full.order_status.sales_order_id} ">
                                <i class="fas fa-eye text-white"></i>
                                </a>
                                <a title="Download sales order invoice" class="btn btn-secondary mx-1" href="#"><span>
                                <i class="fas fa-download text-white"></i></span>
                                </a>
                                <a href="javascript:deleteOrder('${full.order_status.sales_order_id}')" class="btn btn-danger mx-1" id="delete-order-btn" role ="button">
                                <span><i class="fas fa-trash text-white"></i></span>
                                </a >
                                `
                            }

                            return data;
                        }
                    },

                ],
            });
        }
    }

    // Date range filtering
    $(function() {
        var startdate;
        var enddate;
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#DateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#DateRange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        },  function (start, end, label) {
                document.getElementById('start_date').value = start.format('YYYY-MM-DD');
                document.getElementById('end_date').value = end.format('YYYY-MM-DD');


            }); //compare by

    });
}

salessalesdata()