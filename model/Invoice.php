<?php
namespace Totcoclass;

use Totcoclass\DataSource;

class Invoice
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getPdfGenerateValues($id)
    {
        $query = "SELECT * FROM tbl_order WHERE id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }
}
