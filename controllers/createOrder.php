<?php
session_start(); // Start the session
// define variables and set to empty values
//$user_name = $error = $password = "";

    if (isset($_POST['createBtn'])) {

        if ($_POST['pdt_name'] != "" || $_POST['quantity'] != "") {
            $pdtname = $_POST['pdt_name'];
            $selling_price = $_POST['selling_price'];
            $quantity = $_POST['quantity'];


            $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/sales_orders/createSalesOrder.php");

            $PHPobj = json_decode($jsonobj);

            if ($PHPobj->success == 0) {
                $error = $PHPobj->message;
            } else {
                $_SESSION['user_data'] = $PHPobj->data;

                header("Location:index.php");
                die;
            }
        } else {
            $error = "Please fill all fields";
        }
    } else {
        //$error = "Please hit the submit button";
    }

