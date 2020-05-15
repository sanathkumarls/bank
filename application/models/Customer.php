<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 12:30 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Customer
{
    function getCustomerName($c_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from customer where `c_id` = '$c_id'";
        $result = $con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['c_name'];
        }
        return "";
    }
}