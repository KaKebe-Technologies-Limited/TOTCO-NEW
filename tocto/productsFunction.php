<?php

function loadProducts()
{
    // $jsonobj =  file_get_contents("https://www.clavicar.com/campusweekly/api/inv/api/9r0DUctS/lIStaIIpr0dnctz.php");
    $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/products/listAllProducts.php");

    $PHPpdtsObj = json_decode($jsonobj);

    if ($PHPpdtsObj->success == 0) {
        $pdts_error = $PHPpdtsObj->message;
    } elseif ($PHPpdtsObj->success == 1) {
        $pdts_data = $PHPpdtsObj->products;
        $pdts_total = $PHPpdtsObj->totalCount;

        for ($x = 0; $x < $pdts_total; $x++) {
            echo '
       hello world

            ';
        }
    } else {
        $pdts_error = "An unknown error";
    }
}
