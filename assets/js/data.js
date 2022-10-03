

$(document).ready(function () {
    $('#example2').DataTable({
        //processing: true,
        //serverSide: true,

        ajax: {
            url: 'newdata.php',
            dataSrc: ''
        },
        columns: [
            {
                data: 'order_vs_pdt_id',
            },
            {
                data: 'sales_order_id',
            },
            {
                data: 'product_id',
            },
            {
                data: 'quantity',
            },
            {
                data: 'pdt_name',
            },
        ],
    });
});