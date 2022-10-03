<?php
//$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

?>

<script>
$(document).ready(function () {
    $('#example').DataTable({
        //processing: true,
        //serverSide: true,
        ajax: 'data.json',
        columns: [
            {
                data: 'checkbox',
                className: 'text-center',
                orderable: false,
                render: function (data, type, full, meta){
                    return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
                }
            },
            {
                data: 'orderid',
            },
            {
                data: 'product',
            },
            {
                data: 'quantity',
            },
            {
                data: 'price',
            },
            {
                data: 'date',
            },
            {
                data: 'agent name',
            },
            {
                data: 'orderstatus',
                width: '150px',
                render: function(data, type, full, meta) {
                    return `<div class="badge badge-success">${full.orderstatus}</div>`;
                }

            },
            {
                data: 'action',
                render: function(data, type, full, meta){
                    if(type === 'display'){
                    data = data + `<a title="View sales order" class="btn btn-primary mx-1" href="single-order?id=${full.orderid} "><i class="fas fa-eye text-white"></i></a>`+
                    `<a title="Download sales order invoice" class="btn btn-secondary mx-1" href="#"><span><i class="fas fa-download text-white"></i></span></a>` +
                                        `<button class="btn btn-danger mx-1" id="delete-order-btn" type="button"><span><i class="fas fa-trash text-white"></i></span></button>`
                    }

                    return data;
                }
            }

        ],
    });
});

$(function() {

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
    }, cb); //compare by

    cb(start, end);

});

</script>