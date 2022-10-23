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
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/viewSingleSalesOrder.php?id=$id");
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

    function getPendingOrders()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data, true);
        $data = $this->api_data->orders->order_status->isPending;

        if (array_keys($data) == 1){
            return $data;
        }
    }

    function getOrderCount()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data->totalOrders;
        return $data;
    }

    function countApprovedOrders()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php");
        $this->api_data  = json_decode($this->json_data);
        $data            = $this->api_data->orders;
        return $data;
    }

    function countPendingOrders()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php?isPending=1");
        $this->api_data = json_decode($this->json_data, true);
        $data = count($this->api_data);
        return $data;
    }

    function countDeclinedOrders()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/sales_orders/listAllSalesOrders.php?isRejected=1");
        $this->api_data = json_decode($this->json_data, true);
        $data = count($this->api_data);
        return $data;
    }

    //Users
    function getAllUsers()
    {
        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/users/listAllUsers.php");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data;

        return $data;
    }

    function getSingleUser($id)
    {

        $this->json_data = file_get_contents("https://totco.kakebe.com/api/api/users/loadSingleUser.php?user_id=$id");
        $this->api_data = json_decode($this->json_data);
        $data = $this->api_data;

        return $data;
    }

}


