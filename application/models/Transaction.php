<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 1:14 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Transaction
{
    function createtransaction($l_app_no,$status)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "insert into transaction values (null ,'$l_app_no' ,'$status')";
        return $con->query($query);
    }

    function updateTransaction($l_app_no,$status)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "update transaction set `t_status` = '$status' where `l_application_no` = '$l_app_no' ";
        return $con->query($query);
    }
}