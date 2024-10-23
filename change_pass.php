<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');
error_reporting(1);
if (!isset($_SESSION["us"]) || !isset($_SESSION["ps"]) || !isset($_SESSION["ust"]) || !isset($_SESSION['csrf_token'])) {
    echo "<script>window.location='index.php'</script>";

    echo $_SESSION["us"];
} else {
    require_once('_Action/__Fun.php');
    //echo $_SESSION["us"];
?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title>Rand | Driver interface</title>
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/Lato.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/Montserrat.css">
        <!--===============================================================================================-->
        <link href="css/css/styles.css" rel="stylesheet" type="text/css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.css">
    </head>

<body>
    <div class="container-fluid h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container" style="margin-top: -5%;">
                        <img class="brand_logo" src="images/rand.png">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <!--===============================================================================================-->
                    <form id="form" method="post" name="form">
                        <h2>
                            <font color=" #581845" style="margin-left: 8%;"> Reset Password </font>
                        </h2>
                        <hr />
                        <label for="pass" class="label">Current Password :</label>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input id="curpass" class="form-control input_pass" name="password"
                                placeholder="Type Current Password..." required="" autocomplete="on" type="password">
                        </div>
                        <label for="pass" class="label">New Password :</label>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input id="newpass" class="form-control input_pass" name="password"
                                placeholder="Type New Password..." required="" autocomplete="on" type="password">
                        </div>
                        <label for="pass" class="label">Confirm New Password :</label>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input id="confnew" class="form-control input_pass" name="password"
                                placeholder="Confirm New Password..." required="" autocomplete="on" type="password">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button id="update" class="btn btn-outline-danger" name="update" type="button"
                                onclick="update_password()">
                                Update Password</button>
                        </div>
                        <hr />
                        &nbsp;
                        &nbsp;&nbsp;
                        <a href="Home.php" style="margin-left: 20%;">Back to Home Page</a>
                    </form>
                    <!--===============================================================================================-->
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <footer class="footer">
                <div style="background:#581845" class="text-center">
                    <img src="images/rand.png" width="25" height="25" class="d-inline-block align-top">
                    <span class="text-muted"><a href="mailto:Rand-ITSupport@rand.sy" style="color:#FFF3F8">&copy;
                            2020-2021 Created By
                            Rand IT support</a></span>
                </div>
            </footer>
        </div>
    </div>
    <script type="application/javascript" src="js/jquery.sha.256.js"></script>
    <!--===============================================================================================-->
    <script type="application/javascript" src="js/script.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/jquery-3.5.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/bootstrap.min.js?v=4.4.1"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/tether.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/popper.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/moment.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/jquery.toast.js"></script>

    <script>
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            update_password();
        }
    });
    </script>
</body>

</html> <?php
        }
            ?>