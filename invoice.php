<?php

require_once '/Model/API.class.php';
$orderModel = new Api(); // create an instance of API class
$result = $orderModel->getAllSales();
if (! empty($result)) {
    require_once __DIR__ . "lib/PDFService.class.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result);
}

