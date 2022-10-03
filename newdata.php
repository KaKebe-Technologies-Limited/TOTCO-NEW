<?php

header("Content-Type: application/json", true);

require_once __DIR__ . '/Model/API.class.php';

$orderModel = new Api();
$allOrders = $orderModel->getAllSales();

json_encode($allOrders)
?>
