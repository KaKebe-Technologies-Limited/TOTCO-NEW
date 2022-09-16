<?php
use Totcoclass\Order;

require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$result = $orderModel->getSalesOrderValues($_GET["id"]);
$orderItemResult = $orderModel->getOrderItems($result[0]["id"]);
