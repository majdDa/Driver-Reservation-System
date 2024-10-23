<!DOCTYPE html>
<?php

require_once('_Action/__Fun.php');
error_reporting(1);
$lifetime = 600;
session_start();
setcookie(session_name(), session_id(), time() + $lifetime);
$_SESSION['csrf_token'];
if (!isset($_SESSION["us"]) || !isset($_SESSION["ps"]) || !isset($_SESSION["ust"]) || !isset($_SESSION['csrf_token'])) {
    echo "<script>window.location='index.php'</script>";
    //var_dump($_SESSION);
    //echo $_SESSION["us"];
} else {


?>
<html>

<head>
    <title>Rand Co | Driver</title>
    <meta charset="utf-8" />
    <meta content="Rand Co | Driver" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!--===============================================================================================-->
    <link href="images/rand.png" rel="shortcut icon" type="image/x-icon" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css?v=4.4.1" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fullcalendar/core/main.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fullcalendar/daygrid/main.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fullcalendar/timegrid/main.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fullcalendar/list/main.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fullcalendar/bootstrap/main.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/Lato.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/Montserrat.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/calender.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbar-fixed-top row"
                    style="background:#581845;">
                    <a class="navbar-brand">
                        <img src="images/rand.png" width="30" height="30" class="d-inline-block align-top" alt="" />
                        Rand | Driver
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <?php
                                if ($_SESSION["ust"] == 1) { ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Create.php">Create<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="A_Edit.php">View & Edit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="View_Approval.php">Approval</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="Create_user.php">Create User <i class="fa fa-plus-circle "
                                        aria-hidden="true"></i><a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="change_pass.php">| &nbsp;Change Password&nbsp;<i
                                        class="fa fa-key" aria-hidden="true"></i><a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="logout.php">|&nbsp; &nbsp;logout <i class="fa fa-sign-out"
                                        aria-hidden="true"></i><a>
                            </li>
                        </ul>
                        <?php
                                }
                                if ($_SESSION["ust"] == 0) {
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Create.php">Create<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Edit.php">View & Edit</a>
                        </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="change_pass.php"> &nbsp;Change Password&nbsp;<i
                                        class="fa fa-key" aria-hidden="true"></i><a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="logout.php">|&nbsp; &nbsp;logout <i class="fa fa-sign-out"
                                        aria-hidden="true"></i><a>
                            </li>

                        </ul>

                        <?php
                                }
                        ?>

                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
                <form align="center" class="text-center">
                    <div id="calendar"></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <footer class="footer">
                    <div class="text-center">
                        <img src="images/rand.png" width="25" height="25" class="d-inline-block align-top">
                        <span class="text-muted"><a href="mailto:Rand-ITSupport@rand.sy">&copy; 2020-2021 Created By
                                Rand IT support</a></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery-3.3.1.min.js?v=3.3.1"></script>
<!--===============================================================================================-->
<script src="js/jquery-ui.min.js?v=1.12.1"></script>
<!--===============================================================================================-->
<script src="js/moment.min.js?v=2.18.1"></script>
<!--===============================================================================================-->
<script src='fullcalendar/core/main.js'></script>
<!--===============================================================================================-->
<script src='fullcalendar/daygrid/main.js'></script>
<!--===============================================================================================-->
<script src='fullcalendar/timegrid/main.js'></script>
<!--===============================================================================================-->
<script src='fullcalendar/list/main.js'></script>
<!--===============================================================================================-->
<script src='fullcalendar/bootstrap/main.js'></script>
<!--===============================================================================================-->
<script src='js/_Calendar.js'></script>
<!--===============================================================================================-->

</html>
<?php
}
?>