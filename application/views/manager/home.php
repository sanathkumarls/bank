<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 12:19 PM
 */

require_once __DIR__."/../../models/Loan.php";
require_once __DIR__."/../../models/Login.php";
require_once __DIR__."/../../models/Customer.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']))
{
    $e_email = $_SESSION['email'];
    $objLoan = new Loan();
    $objLogin = new Login();
    $objCustomer = new Customer();

    $result1 = $objLogin->getLoginDetails($e_email);
    if($result1)
    {
        $row1 = $result1->fetch_assoc();
        $e_name = $row1['l_name'];
    }
    else
        header('Location: ../login.php');

    $result2 = $objLoan->getPendingRefer();

}
else
{
    header('Location: ../login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manager - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../../../assets/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../../assets/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="../../../assets/sb-admin/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="home.php">Manager Dashboard</a>


    <a href="../../controllers/LogoutController.php" style="margin-left: 75%">
        <button class="btn-primary" >Logout</button></a>
    <!--logout button here-->

</nav>

<div align="center" style="font-size: xx-large">
    Welcome <?php echo $e_name;?> !!!
</div>
<br><br>
<div class="accordion">
    <table class="table-bordered" width="100%" cellspacing="10px" border="10px" cellpadding="10%" align="center">
        <thead class="font-weight-bold">
        <tr>
            <td>Customer Id</td>
            <td>Customer Name</td>
            <td>Loan Application Number</td>
            <td>Application Type</td>
            <td>Amount</td>
            <td>Referred Reason</td>
            <td>Action</td>
        </tr>
        </thead>

        <?php

        if($result2)
        {
            $msg = "Number of defaults is ";
            while($row = $result2->fetch_assoc())
            {
                echo "<tr>
            <td>".$row['c_id']."</td>
            <td>".$objCustomer->getCustomerName($row['c_id'])."</td>
            <td>".$row['l_application_no']."</td>
            <td>".$row['l_type']."</td>
            <td>".$row['l_amt']."</td>
            <td>".$msg.$objLoan->getDefaults($row['c_id'])."</td>
            <td><form method='post' action='../../controllers/ApproveReject.php'><input type='text' name='l_application_no' value='".$row['l_application_no']."' hidden><button class='btn-success' name='submit' value='approve'>Approve</button>&nbsp;<button class='btn-danger' name='submit' value='reject'>Reject</button></form></td>
        </tr>";
            }
        }
        else
            echo "</table> <div align='center' style='font-size: large' class='font-weight-bold'> No Records Found...</div>"

        ?>

    </table>
</div>




</body>

</html>

