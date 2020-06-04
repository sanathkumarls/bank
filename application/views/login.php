<?php
/**
 * Created by PhpStorm.
 * User: sanathls
 * Date: 04/06/20
 * Time: 4:56 PM
 */


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BANK - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="../../assets/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/sb-admin/vendor/fontawesome-free/css/all.css" rel="stylesheet">


</head>

<body class="bg-danger">


<div class="header bg-gradient-danger py-7 py-lg-8 mt-5">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-6">
                    <h1 class="text-white">Risk Anti Money Laundering</h1>
                    <p class="text-lead text-light">Project on Financial and Banking Sector</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container mt-8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0 mt-5">

                <div class="card-body px-lg-5 py-lg-5 ">
                    <form method="post" action="../controllers/LoginController.php">
                        <div class="form-group mb-3 mt-5">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input class="form-control" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input class="form-control" name="password" placeholder="Password" type="password" required>
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-white">Remember me</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary my-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>