<?php

function loadProducts()
{
    // $jsonobj =  file_get_contents("https://www.clavicar.com/campusweekly/api/inv/api/9r0DUctS/lIStaIIpr0dnctz.php");
    $jsonobj =  file_get_contents("https://totco.kakebe.com/api/users/createUser.php");

    $PHPpdtsObj = json_decode($jsonobj);

    if ($PHPpdtsObj->status == "success") {
        $pdts_data = $PHPpdtsObj->results;
        $pdts_total = $PHPpdtsObj->totalResults;
        for ($x = 0; $x < count($pdts_data); $x++) {
            echo '
            <tr>
            <td class="p-0 text-center">
              <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                  id="checkbox-1">
                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
              </div>
            </td>
            <td>T001</td>
            <td class="text-truncate">
                '. $pdts_data[$x]->title .'
            </td>
            <td class="align-middle">
                1 Tonne
            </td>
            <td>UGX 3500<span class="font-12 ps-1 text-muted">UGX</span></td>
            <td>
              <div class="">28 Aug 2022</div>
            </td>
            <td>
              <div class="">Oluk Mark</div>
            </td>
            <td>
              <div class="badge badge-success">CONFIRMED</div>
            </td>
            <td>
            <div class="d-flex flex-row">
                <div class="p-2 mx-1 bg-primary"><a href="single-sales-order.php"><i class="fas fa-eye text-white"></i></a></div>
                <div class="p-2 mx-1 bg-secondary"><a href><span><i class="fas fa-download text-white"></i></span></a></div>
                <div class="p-2 mx-1 bg-danger"><a href=""><span><i class="fas fa-trash text-white"></i></span></a></div>
            </div
            </td>
          </tr>
            ';
        }
    } else {
        $pdts_error = "An unknown error";
    }
}
