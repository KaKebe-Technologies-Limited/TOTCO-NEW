<?php

class Api
{
    public $json_data;
    public $api_data;


    function getAllSales()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data, TRUE);
        $data = $this->api_data;

        return $data;
    }

    function getSingleOrder()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data, TRUE);
        $data = $this->api_data['orders'];

        return $data;
    }

}

$orderModel = new Api();
$allOrders = $orderModel->getSingleOrder();

echo json_encode($allOrders);

