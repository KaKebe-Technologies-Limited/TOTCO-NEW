/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */



/* --------------------------------
    Sales order approval dialog boxes
/** -------------------------------- */

// Confirmation
$('#approve-btn').click(function() {
    swal({
        title: 'Confirm Sales Order Approval',
        text: 'Are you sure you want to approve this sales order?',
        buttons: ['Cancel', 'Confirm'],
        icon: 'warning'
    })
    .then((willSubmit) => {
        if(willSubmit) {
            swal({
                title: "Success",
                text: "Generate a purchase order",
                icon: "success",
                button: false,
                timer: 2000
            })
        }
    })
});

//Rejection
$('#reject-btn').click(function() {
        swal({
            title: 'Confirm Sales Order Rejection',
            text: 'Are you sure you want to reject this sales order?',
            buttons: ['Cancel', 'Confirm'],
            icon: 'warning'
        })
        .then((willDelete) => {
            if(willDelete) {
                swal({
                    title: "Success",
                    text: "Sales order successfully rejected",
                    icon: "success",
                    button: false,
                    timer: 2000
                })
            }
        })
    });

	// User registration approval

	$('#approve-user-btn').click(function() {
		swal({
			title: 'Confirm User Registration',
			text: 'Are you sure you want to approve this user?',
			buttons: ['Cancel', 'Confirm'],
			icon: 'warning'
		})
		.then((willSubmit) => {
			if(willSubmit) {
				swal({
					title: "Success",
					text: "New user approval successful",
					icon: "success",
					button: false,
					timer: 2000
				})
			}
		})
	});

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
						title: "Success",
						text: "You have rejected this user",
						icon: "success",
						button: false,
						timer: 2000
					})
				}
			})
		});


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






