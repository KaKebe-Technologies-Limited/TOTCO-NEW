<?php

?>


<script>
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
                { data: 'order_items[0].pdt_name',
                    width: '150px',
                    render: function(data, type, full, meta) {
                        return `<td>
                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                    class="custom-control-input emp_checkbox" data-emp-id="" name="select-all" value="1" id="checkbox-all">
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                        </td>`;
                    }
                },
                { data: 'order_status.sales_order_id',},
                { data: 'order_items[0].pdt_name',
                    width: '150px',
                    render: function(data, type, full, meta) {
                        return `<div class="badge badge-success">success</div>`;
                    }
                },
                { data: 'order_items[0].quantity',},
                { data: 'order_status.createdAt',},
                { data: 'order_status.createdBy',},
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

</script>