
function format ( d ) {
    // `d` is the original data object for the row
    return '<div class="row flex-wrap">' +
                '<div class="col-xl-4 border-end-xl-lg-md">'+
                    '<table cellpadding="" cellspacing="0" border="0" style="padding-left:50px;">'+
                        '<tr>'+
                            '<td>Branch Manager:</td>'+
                            '<td>'+d.branch_manager+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Extension:</td>'+
                            '<td>'+d.extn+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Start date:</td>'+
                            '<td>'+d.start_date+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>Extra info:</td>'+
                            '<td>And any further details here (images etc)...</td>'+
                        '</tr>'+
                    '</table>' +
                '</div>' +
                '<div class="col-xl-8">'+
                    '<table class="table table-striped table-hover display select">' +
                        '<thead>' +
                            '<th>Product Name</th>' +
                            '<th>Quantity On Hand</th>' +
                            '<th>Quantity Available</th>' +
                            '<th>Quantity Reserved</th>' +
                            '<th>Quantity Picked</th>' +
                            '<th>Status</th>' +
                        '</thead>'+
                        '<tbody>' +
                            '<tr>' +
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                            '</tr>'+
                            '<tr>' +
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                                '<td>'+d.branch_manager+'</td>'+
                            '</tr'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
            '</div>';

}
var req = new XMLHttpRequest();
var url = "https://totco.kakebe.com/api/api/branch/listAllBranches.php";
req.open('GET', url, true);
req.send();
req.onreadystatechange = function() {
    if(this.readyState == 4 && req.status == 200) {
        var dataset = JSON.parse(req.responseText);

   var table = $('#stores-table').DataTable({
        paging: false,
        searching: false,
        "data": dataset.branches,
        'columns': [
            {
                'className':      'details-control',
                'orderable':      false,
                'data':           null,
                'defaultContent': ''
            },
            {'data': 'branch_id'},
            { 'data': 'branch_name' },
            { 'data': 'location' },

        ],
        'order': [[3, 'asc']]
    } );

   // event listener for opening and closing details
   $('#stores-table tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

      if ( row.child.isShown() ) {
         // This row is already open - close it
         row.child.hide();
         tr.removeClass('shown');
      }
      else {
         // Open this row
         row.child( format(row.data()) ).show();
         tr.addClass('shown');
      }
   } );
}
}
