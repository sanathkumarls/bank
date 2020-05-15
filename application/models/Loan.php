<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 12:16 PM
 */

require_once __DIR__."/../utilities/Database.php";

class Loan
{
    function getPendingVerification()
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from loans where l_application_no not in (select l_application_no from transaction)";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function getPendingVerificationFromAppNo($l_app_no)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from loans where `l_application_no` = '$l_app_no' ";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function getLoanDetailsExcept($c_id,$l_app_no)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from loans where `c_id` = '$c_id' and `l_application_no` != '$l_app_no' ";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function getPendingRefer()
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select * from loans where `l_application_no` in (select l_application_no from transaction where `t_status` = 'referred')";
        $result = $con->query($query);
        if($result->num_rows > 0)
            return $result;
        return false;
    }

    function getDefaults($c_id)
    {
        $db = new Database();
        $con = $db->open_connection();
        $query = "select sum(defaults) as 'defaults' from loans where c_id ='$c_id'" ;
        $result = $con->query($query);
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            return $row['defaults'];
        }
        return 0;
    }
}

