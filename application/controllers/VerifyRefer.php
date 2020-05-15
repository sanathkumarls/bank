<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 1:08 PM
 */

require_once __DIR__."/../models/Transaction.php";

if(isset($_POST['submit']) && isset($_POST['status']))
{
    $l_app_no = $_POST['submit'];
    $status = $_POST['status'];

    $objVerifyRefer = new VerifyRefer();

    if($status == "verify")
        $objVerifyRefer->verify($l_app_no);

    if($status == "refer")
        $objVerifyRefer->refer($l_app_no);
}

class VerifyRefer
{

    function verify($l_app_no)
    {
        $objTransaction = new Transaction();
        $objTransaction->createtransaction($l_app_no,"verified");
        echo "<script>
                        alert('Loan Details Verified Successfully');
                       window.location.href='../views/employee/home.php';
                </script>";
    }

    function refer($l_app_no)
    {
        $objTransaction = new Transaction();
        $objTransaction->createtransaction($l_app_no,"referred");
        echo "<script>
                        alert('Loan Details Referred Successfully');
                       window.location.href='../views/employee/home.php';
                </script>";
    }
}