<?php
use Totcoclass\Config;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once __DIR__ . '/../lib/Config.php';
$config = new Config();

class SinglePage {

    function singlePage($result, $orderItemResult) {
        require_once __DIR__ . '/single-order.php';
        $html = getHTMLPurchaseDataToPDF($result, $orderItemResult, $orderedDate, $due_date);
        $filename = "Invoice-" . $result[0]["order_invoice"];
    }
}
?>