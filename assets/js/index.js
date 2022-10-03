
/* --------------------------------
    Sales order approval dialog boxes
/** -------------------------------- */

// Confirmation & rejection
$('#approve-btn').click(function() {
    Swal.fire({
		title: 'Do you want to accept this sales order?',
		showCancelButton: true,
		confirmButtonText: 'Confirm',
		showDenyButton: true,
		denyButtonText: 'Reject',
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
				title: 'Sales order confirmed!',
			  })
		} else if (result.isDenied) {

			await Toast.fire({
				icon: 'info',
				title: 'Sales order rejected.'
			  })
		}
	  })
})

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



