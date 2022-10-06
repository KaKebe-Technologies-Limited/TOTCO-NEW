<?php

class Api
{
    public $json_data;
    public $api_data;



    function getSingleOrder()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data->orders[0]->order_items;
        
        return $data;
    }
    function getSingleOrderID($id)
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/viewSingleSalesOrder.php?id=2");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data;
        
        return $data;
    }
    function getAllSales()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data->orders;
        return $data;
    }

}


