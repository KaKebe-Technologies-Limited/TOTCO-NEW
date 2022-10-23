<?php
session_start(); // Start the session
// define variables and set to empty values
$user_name = $error = $password = "";


    if (isset($_POST['createBtn'])) {

            $pdt_name= $_POST['pdt_name'];
            $quantity = $_POST['quantity'];
            $selling_price = $_POST['selling_price'];

            $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/sales_orders/createSalesOrder.php?pdt_name=$pdt_name&quantity=$quantity&selling_price=$selling_price");

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


