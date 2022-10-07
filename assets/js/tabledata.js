
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
                { data: null,
                    render: function(data, full) {
                        return `<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                            id="checkbox-' . $sales_orders[$x]->sales_order_id . '">
                        <label for="checkbox-' . $sales_orders[$x]->sales_order_id . '" class="custom-control-label">&nbsp;</label>
                        </div>`;
                    }
                },
                { data: 'order_status.sales_order_id'},
                { data: 'order_items[0].pdt_name'},
                { data: 'order_items[0].quantity'},
                { data: 'order_items[0].quantity'},
                { data: 'order_status.createdAt'},
                { data: 'order_status.Agent_Name'},
                { data: 'order_status',
                    render: function(data, full, row) {
                        return `<div class="badge badge-success">${full.order_status}</div>`;
                    }
                },
                { data: null,
                    render: function(data, type, full, meta){
                        return `<a title="View sales order" class="btn btn-primary mx-1" href="single-order?id=${full.order_status.sales_order_id} "><i class="fas fa-eye text-white"></i></a>`+
                        `<a title="Download sales order invoice" class="btn btn-secondary mx-1" href="#"><span><i class="fas fa-download text-white"></i></span></a>` +
                                            `<button class="btn btn-danger mx-1" id="delete-order-btn" type="button"><span><i class="fas fa-trash text-white"></i></span></button>`



                    }
                },
            ],
        });
    }
}

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

            datatable.ajax.url(`sales-table?startdate=${start.format('YYYY-MM-DD')}&enddate=${end.format('YYYY-MM-DD')}`).load();
        }); //compare by

});

