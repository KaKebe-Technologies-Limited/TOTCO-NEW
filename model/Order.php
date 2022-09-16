<?php
namespace Totcoclass;

use Totcoclass\DataSource;

class Order
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getAllOrders()
    {
        $query = "SELECT * FROM tbl_order";
        $result = $this->ds->select($query);
        return $result;
    }

    function getPdfGenerateValues($id)
    {
        $query = "SELECT * FROM tbl_order WHERE id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function deleteOrderItem($id) {

        if(isset($_POST['id'])) {
            $id = trim($_POST['id']);
            $query = "DELETE FROM tbl_order WHERE id in ($id)";
            if(mysqli_query($this->ds, $sql)){
                echo $id;
            }
        }

    }

    function getOrderItems($order_id)
    {
        $sql = "SELECT tbl_order_items.*,tbl_product.product_title FROM tbl_order_items
                JOIN tbl_product ON tbl_order_items.product_id=tbl_product.id WHERE tbl_order_items.order_id='" . $order_id . "'";
        $query = "SELECT * FROM tbl_order_items WHERE order_id='" . $order_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getQuantity($order_id) {
        $query = "SELECT * FROM tbl_order_items WHERE id='" . $order_id ."'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getProduct($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE id='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getSalesOrderValues($id)
    {
        $query = "SELECT * FROM tbl_order WHERE id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

}
