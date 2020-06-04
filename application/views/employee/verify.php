<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 14/05/20
 * Time: 12:33 PM
 */


require_once __DIR__."/../../models/Loan.php";
require_once __DIR__."/../../models/Login.php";
require_once __DIR__."/../../models/Customer.php";
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role']))
{
    $e_email = $_SESSION['email'];
    $objLoan = new Loan();
    $objCustomer = new Customer();

    if(isset($_POST['submit']) && isset($_POST['c_id']))
    {
        $l_app_no = $_POST['submit'];
        $c_id = $_POST['c_id'];
    }
    else
        header('Location: ../home.php');

    $result1 = $objLoan->getPendingVerificationFromAppNo($l_app_no);
    $c_name = $objCustomer->getCustomerName($c_id);
    $result2 = $objLoan->getLoanDetailsExcept($c_id,$l_app_no);

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

    <title>Employee - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../../../assets/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../../assets/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="../../../assets/sb-admin/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="home.php">Employee Dashboard</a>


    <a href="../../controllers/LogoutController.php" style="margin-left: 75%">
        <button class="btn-primary" >Logout</button></a>
    <!--logout button here-->

</nav>

<div align="center" style="font-size: xx-large">
    Loan Details Of <?php echo $c_name;?>
</div>
<br><br>
<div class="accordion">
    <table class="table-bordered" width="100%" cellspacing="10px" border="10px" cellpadding="10%" align="center">
        <thead class="font-weight-bold">
        <tr>
            <td>Loan Application Number</td>
            <td>Application Type</td>
            <td>Amount</td>
        </tr>
        </thead>

        <?php

        if($result1)
        {
            while($row = $result1->fetch_assoc())
            {
                echo "<tr>
            <td>".$row['l_application_no']."</td>
            <td>".$row['l_type']."</td>
            <td>".$row['l_amt']."</td>
        </tr>";
            }
        }
        else
            echo "</table> <div align='center' style='font-size: large' class='font-weight-bold'> No Records Found...</div>"

        ?>

    </table>
</div>
<br><br>
<h3 align="center">Previous Loans</h3>
<div class="accordion">
    <table class="table-bordered" width="100%" cellspacing="10px" border="10px" cellpadding="10%" align="center">
        <thead class="font-weight-bold">
        <tr>
            <td>Loan Application Number</td>
            <td>Application Type</td>
            <td>Amount</td>
            <td>Defaults</td>
        </tr>
        </thead>

        <?php
        $defaults = 0;
        if($result2)
        {
            while($row = $result2->fetch_assoc())
            {
                $defaults += intval($row['defaults']);

                echo "<tr>
            <td>".$row['l_application_no']."</td>
            <td>".$row['l_type']."</td>
            <td>".$row['l_amt']."</td>
            <td>".$row['defaults']."</td>
        </tr>";
            }
        }
        else
            echo "</table> <div align='center' style='font-size: large' class='font-weight-bold'> No Records Found...</div>"

        ?>

    </table>
</div>
<br><br>
<div align="center">

    <form method='post' action='../../controllers/VerifyRefer.php'>
        <input type='text' name='application_no' value='<?php echo $l_app_no;?>' hidden>
        <button class='btn-success' name='submit' value='approve'>Approve</button>
        <button class='btn-danger' name='submit' value='reject'>Reject</button>
        <button class='btn-primary' name='submit' value='refer'>Refer</button>
    </form>
</div>

</body>

</html>
