<?php

require '../model/API.class.php';
$orderModel = new Api();
$result = $orderModel->getSingleOrderID();
$items = $orderModel->getSingleOrder;
if (! empty($result)) {
    require_once "../lib/PDFService.class.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $items);
}

