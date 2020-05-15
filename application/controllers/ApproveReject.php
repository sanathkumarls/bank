<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 1:46 PM
 */

require_once __DIR__."/../models/Transaction.php";

if(isset($_POST['submit']) && isset($_POST['l_application_no']))
{
    $l_app_no = $_POST['l_application_no'];
    $status = $_POST['submit'];

    $objApproveReject = new ApproveReject();

    if($status == "approve")
      $objApproveReject->approve($l_app_no);

    if($status == "reject")
        $objApproveReject->reject($l_app_no);
}


class ApproveReject
{
    function approve($l_app_no)
    {
        $objTransaction = new Transaction();
        $objTransaction->updateTransaction($l_app_no,"approved");
        echo "<script>
                        alert('Loan Approved Successfully');
                       window.location.href='../views/manager/home.php';
                </script>";
    }

    function reject($l_app_no)
    {
        $objTransaction = new Transaction();
        $objTransaction->updateTransaction($l_app_no,"rejected");
        echo "<script>
                        alert('Loan Rejected Successfully');
                       window.location.href='../views/manager/home.php';
                </script>";
    }


}