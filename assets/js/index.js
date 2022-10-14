//Date
Date.prototype.today = function () {
    return ((this.getDate() < 10)?"0":"") + this.getDate() +"/"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"/"+ this.getFullYear();
}

var newDate = new Date();

// Generation of purchase order document
const generatePurchaseOrder = () => {
    var poXML = new XMLHttpRequest();
    var url = "https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php";
    poXML.open('GET', url, true);
    poXML.send();
    poXML.onreadystatechange = function() {
        if(this.readyState == 4 && poXML.status == 200) {
            var dataset = JSON.parse(poXML.responseText);
            let dd = {
                content: [
                {
                    columns: [
                    /*{
                        image:
						data:
                        width: 150,
                    }*/,
                    [
                        {
                        text: 'PURCHASE ORDER',
                        color: '#333333',
                        width: '*',
                        fontSize: 28,
                        bold: true,
                        alignment: 'right',
                        margin: [0, 0, 0, 15],
                        },
                        {
                        stack: [
                            {
                            columns: [
                                {
                                text: 'Receipt No.',
                                color: '#aaaaab',
                                bold: true,
                                width: '*',
                                fontSize: 12,
                                alignment: 'right',
                                },
                                {
                                text: '00001',
                                bold: true,
                                color: '#333333',
                                fontSize: 12,
                                alignment: 'right',
                                width: 100,
                                },
                            ],
                            },
                            {
                            columns: [
                                {
                                text: 'Date Issued',
                                color: '#aaaaab',
                                bold: true,
                                width: '*',
                                fontSize: 12,
                                alignment: 'right',
                                },
                                {
                                text: new Date().toLocaleDateString()								,
                                bold: true,
                                color: '#333333',
                                fontSize: 12,
                                alignment: 'right',
                                width: 100,
                                },
                            ],
                            },
                            {
                            columns: [
                                {
                                text: 'Status',
                                color: '#aaaaab',
                                bold: true,
                                fontSize: 12,
                                alignment: 'right',
                                width: '*',
                                },
                                {
                                text: 'CONFIRMED',
                                bold: true,
                                fontSize: 14,
                                alignment: 'right',
                                color: 'green',
                                width: 100,
                                },
                            ],
                            },
                        ],
                        },
                    ],
                    ],
                },
                {
                    columns: [
                    {
                        text: 'From',
                        color: '#aaaaab',
                        bold: true,
                        fontSize: 14,
                        alignment: 'left',
                        margin: [0, 20, 0, 5],
                    },
                    {
                        text: 'To',
                        color: '#aaaaab',
                        bold: true,
                        fontSize: 14,
                        alignment: 'left',
                        margin: [0, 20, 0, 5],
                    },
                    ],
                },
                {
                    columns: [
                    {
                        text: 'Totco Grains & Cereals',
                        bold: true,
                        color: '#333333',
                        alignment: 'left',
                    },
                    {
                        text: dataset.orders[0].order_status.Agent_Name,
                        bold: true,
                        color: '#333333',
                        alignment: 'left',
                    },
                    ],
                },
                {
                    columns: [
                    {
                        text: 'Address',
                        color: '#aaaaab',
                        bold: true,
                        margin: [0, 7, 0, 3],
                    },
                    {
                        text: 'Address',
                        color: '#aaaaab',
                        bold: true,
                        margin: [0, 7, 0, 3],
                    },
                    ],
                },
                {
                    columns: [
                    {
                        text: 'Rd \n Odokomit\n   Odokomit',
                        style: 'invoiceBillingAddress',
                    },
                    {
                        text: 'Gulu Rd\n Odokomit\n   Odokomit',
                        style: 'invoiceBillingAddress',
                    },
                    ],
                },
                '\n\n',
                {
                    width: '100%',
                    alignment: 'center',
                    text: 'Invoice No. 123',
                    bold: true,
                    margin: [0, 10, 0, 10],
                    fontSize: 15,
                },
                {
                    layout: {
                    defaultBorder: false,
                    hLineWidth: function(i, node) {
                        return 1;
                    },
                    vLineWidth: function(i, node) {
                        return 1;
                    },
                    hLineColor: function(i, node) {
                        if (i === 1 || i === 0) {
                        return '#bfdde8';
                        }
                        return '#eaeaea';
                    },
                    vLineColor: function(i, node) {
                        return '#eaeaea';
                    },
                    hLineStyle: function(i, node) {
                        // if (i === 0 || i === node.table.body.length) {
                        return null;
                        //}
                    },
                    // vLineStyle: function (i, node) { return {dash: { length: 10, space: 4 }}; },
                    paddingLeft: function(i, node) {
                        return 10;
                    },
                    paddingRight: function(i, node) {
                        return 10;
                    },
                    paddingTop: function(i, node) {
                        return 2;
                    },
                    paddingBottom: function(i, node) {
                        return 2;
                    },
                    fillColor: function(rowIndex, node, columnIndex) {
                        return '#fff';
                    },
                    },
                    table: {
                    headerRows: 1,
                    widths: [ '*', 'auto', 100, '*' ],
                    body: [
                        [
                        {
                            text: 'ITEM DESCRIPTION',
                            fillColor: '#eaf2f5',
                            border: [false, true, false, true],
                            margin: [0, 5, 0, 5],
                            textTransform: 'uppercase',
                        },
                        {
                            text: 'QUANTITY',
                            fillColor: '#eaf2f5',
                            border: [false, true, false, true],
                            margin: [0, 5, 0, 5],
                            textTransform: 'uppercase',
                        },
                        {
                            text: 'PRICE (/kg)',
                            fillColor: '#eaf2f5',
                            border: [false, true, false, true],
                            margin: [0, 5, 0, 5],
                            textTransform: 'uppercase',
                        },
                        {
                            text: 'ITEM TOTAL',
                            border: [false, true, false, true],
                            alignment: 'right',
                            fillColor: '#eaf2f5',
                            margin: [0, 5, 0, 5],
                            textTransform: 'uppercase',
                        },
                        ],
                        [
                        {
                            text: dataset.orders[0].order_items[0].pdt_name,
                            border: [false, false, false, true],
                            margin: [0, 5, 0, 5],
                            alignment: 'left',
                        },
                        {
                            text: dataset.orders[0].order_items[0].quantity,
                            border: [false, false, false, true],
                            margin: [0, 5, 0, 5],
                            alignment: 'left',
                        },
                        {
                            text: dataset.orders[0].order_items[0].selling_price,
                            border: [false, false, false, true],
                            margin: [0, 5, 0, 5],
                            alignment: 'left',
                        },
                        {
                            border: [false, false, false, true],
                            text: dataset.orders[0].order_items[0].quantity * dataset.orders[0].order_items[0].selling_price ,
                            fillColor: '#f5f5f5',
                            alignment: 'right',
                            margin: [0, 5, 0, 5],
                        },
                        ],

                    ],
                    },
                },
                '\n',
                '\n\n',
                {
                    layout: {
                    defaultBorder: false,
                    hLineWidth: function(i, node) {
                        return 1;
                    },
                    vLineWidth: function(i, node) {
                        return 1;
                    },
                    hLineColor: function(i, node) {
                        return '#eaeaea';
                    },
                    vLineColor: function(i, node) {
                        return '#eaeaea';
                    },
                    hLineStyle: function(i, node) {
                        // if (i === 0 || i === node.table.body.length) {
                        return null;
                        //}
                    },
                    // vLineStyle: function (i, node) { return {dash: { length: 10, space: 4 }}; },
                    paddingLeft: function(i, node) {
                        return 10;
                    },
                    paddingRight: function(i, node) {
                        return 10;
                    },
                    paddingTop: function(i, node) {
                        return 3;
                    },
                    paddingBottom: function(i, node) {
                        return 3;
                    },
                    fillColor: function(rowIndex, node, columnIndex) {
                        return '#fff';
                    },
                    },
                    table: {
                    headerRows: 1,
                    widths: ['*', 'auto'],
                    body: [
                        [
                        {
                            text: 'Payment Subtotal',
                            border: [false, true, false, true],
                            alignment: 'right',
                            margin: [0, 5, 0, 5],
                        },
                        {
                            border: [false, true, false, true],
                            text: dataset.orders[0].order_items[0].quantity * dataset.orders[0].order_items[0].selling_price,
                            alignment: 'right',
                            fillColor: '#f5f5f5',
                            margin: [0, 5, 0, 5],
                        },
                        ],
                        [
                        {
                            text: 'Total Amount',
                            bold: true,
                            fontSize: 20,
                            alignment: 'right',
                            border: [false, false, false, true],
                            margin: [0, 5, 0, 5],
                        },
                        {
                            text: dataset.orders[0].order_items[0].quantity * dataset.orders[0].order_items[0].selling_price,
                            bold: true,
                            fontSize: 20,
                            alignment: 'right',
                            border: [false, false, false, true],
                            fillColor: '#f5f5f5',
                            margin: [0, 5, 0, 5],
                        },
                        ],
                    ],
                    },
                },
                '\n\n',
                /*{
                    text: 'NOTES',
                    style: 'notesTitle',
                },
                {
                    text: 'Some notes goes here \n Notes second line',
                    style: 'notesText',
                }, */
                ],
                styles: {
                notesTitle: {
                    fontSize: 10,
                    bold: true,
                    margin: [0, 50, 0, 3],
                },
                notesText: {
                    fontSize: 10,
                },
                },
                defaultStyle: {
                columnGap: 20,
                //font: 'Quicksand',
                },
            };

            pdfMake.createPdf(dd).download()
        }
    }
}

/* --------------------------------
    Sales order approval dialog boxes
/** -------------------------------- */

// Confirmation & rejection

const confirmOrder = (id) => {
$('#confirm-btn').click(function() {
    Swal.fire({
		title: 'Do you want to accept this sales order?',
		showCancelButton: true,
		confirmButtonText: 'Yes, Confirm',
		icon: 'warning',
		reverseButtons: true,
	  }).then(async (result) => {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-right',
			iconColor: 'white',
			customClass: {
			  popup: 'colored-toast',
			  popout: 'anima'
			},
			showConfirmButton: false,
			timer: 1500,
			timerProgressBar: true
		  })
		if (result.isConfirmed) {
			$.ajax({
				url: `https://totco.kakebe.com/api/api/sales_orders/updateSalesOrder.php?id=${id}&isApproved=1&isPending=0`,
				type: "POST",
			})
			await Toast.fire({
				icon: 'success',
				title: 'Sales order confirmed!',
				}, generatePurchaseOrder()
			)

		} else if (result.isDenied) {

			await Toast.fire({
				icon: 'info',
				title: 'Sales order rejected.'
			  })
		}
	  })
})
}

const rejectOrder = (id) => {
$('#reject-btn').click(function() {
    Swal.fire({
		title: 'Do you want to reject this sales order?',
		showCancelButton: true,
		confirmButtonText: 'Yes, reject',
		icon: 'warning',
		reverseButtons: true,
	  }).then(async (result) => {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-right',
			iconColor: 'white',
			customClass: {
			  popup: 'colored-toast',
			  popout: 'anima'
			},
			showConfirmButton: false,
			timer: 1500,
			timerProgressBar: true
		  })
		if (result.isConfirmed) {
			$.ajax({
				url: `https://totco.kakebe.com/api/api/sales_orders/updateSalesOrder.php?id=${id}&isRejected=1&isPending=0`,
				type: "POST",
			})
			  await Toast.fire({
				icon: 'success',
				title: 'Sales order rejected!',
			  })
		}
	})
})
}
// User registration approval

	$('#approve-user-btn').click(function() {
		Swal.fire({
			title: 'Do you want to confirm this new user?',
			showCancelButton: true,
			confirmButtonText: 'Confirm',
			showDenyButton: true,
			denyButtonText: 'Deny',
			icon: 'warning',
		  }).then(async (result) => {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-right',
				iconColor: 'white',
				customClass: {
				  popup: 'colored-toast',
				  popout: 'anima'
				},
				showConfirmButton: false,
				timer: 1500,
				timerProgressBar: true
			  })
			if (result.isConfirmed) {
				  await Toast.fire({
					icon: 'success',
					title: 'New user succesfully registered!',
				  })
			} else if (result.isDenied) {

				await Toast.fire({
					icon: 'info',
					title: 'New user registration denied'
				  })
			}
		  })
	})

	//user registration Rejection
	$('#reject-user-btn').click(function() {
			swal({
				title: 'Confirm User Rejection',
				text: 'Are you sure you want to reject this new user?',
				buttons: ['Cancel', 'Confirm'],
				icon: 'warning'
			})
			.then((willDelete) => {
				if(willDelete) {
					swal({
						title: "Rejected",
						text: "You have rejected this user",
						icon: "success",
						button: false,
						timer: 2000
					})
				}
			})
		});

	// Sales order deletion confirmation
	$('#delete-order-btn').click(function() {
		swal({
			title: 'Confirm Sales Order Deletion',
			text: 'Are you sure you want to delete this order?',
			buttons: ['Cancel', 'Confirm'],
			icon: 'warning'
		})
		.then((willDelete) => {
			if(willDelete) {
				swal({
					title: "Deleted",
					text: "You have deleted this order",
					icon: "success",
					button: false,
					timer: 2000
				})
			}
		})
	});

/* --------------------------------
    login toast notification
/** -------------------------------- */



/* --------------------------------
    form action dialog boxes
/** -------------------------------- */

// Bulk action

$(document).ready(function() {
	/* delete selected records*/
	$('#apply_btn').on('click', function(e) {
		var order = [];
		$(".emp_checkbox:checked").each(function() {
			order.push($(this).data('emp-id'));
		});
		if(order.length <=0) {
			alert("Please select records.");
		}
		else {
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(order.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = order.join(",");
				$.ajax({
					type: "POST",
					url: "controllers/delete.php",
					cache:false,
					data: 'id='+selected_values,
					success: function(response) {
						/* remove deleted order rows*/
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {
							$("#"+ids[i]).remove();
						}
					}
				});
			}
		}
	});
});
$(document).on('click', '#checkbox-all', function() {
	$(".emp_checkbox").prop("checked", this.checked);
	//$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
$(document).on('click', '.emp_checkbox', function() {
	if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
	$('#checkbox-all').prop('checked', true);
	} else {
	$('#checkbox-all').prop('checked', false);
	}
	//$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});



/*----------------------------------------------------------------
* CHECK BOX
*----------------------------------------------------------------*/

$(document).ready(function() {
	$('#checkbox-all').select(function() {
		alert( "Handler for .select() called." );
		console.log('hELLO')
	  });
})


/*----------------------------------------------------------------
* International Phone Input
*----------------------------------------------------------------*/

var input = document.querySelector("#newNumber");
window.intlTelInput(input, {
	initialCountry: "auto",
	geoIpLookup: function(success, failure) {
		$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
		var countryCode = (resp && resp.country) ? resp.country : "ug";
		success(countryCode);
		});
	},
});



