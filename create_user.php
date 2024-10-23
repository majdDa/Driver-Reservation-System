<!DOCTYPE html>
<?php session_start();
require_once('_Action/header.php');
if (!isset($_SESSION["us"]) || !isset($_SESSION["ps"]) || !isset($_SESSION["ust"]) || !isset($_SESSION['csrf_token'])) {
    echo "<script>window.location='index.php'</script>";
} else {
    require_once('_Action/__Fun.php');
    error_reporting(1);
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta content="Source code generated using rand.sy" name="description" />
    <meta content="rand.sy" name="author" />
    <!--===============================================================================================-->
    <title>Rand|Driver interface</title>
    <!--===============================================================================================-->
    <link href="images/rand.png" rel="shortcut icon" type="image/x-icon" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/Lato.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/Montserrat.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/_Create.css" />
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-fluid	">
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
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="Create.php">Create</a>
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
                                <a class="nav-link" href="logout.php">|&nbsp; &nbsp;logout <i class="fa fa-sign-out"
                                        aria-hidden="true"></i><a>
                            </li>
                        </ul>
                        <?php
                                }
                                if ($_SESSION["ust"] == 0) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Create.php">Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Edit.php">View & Edit</a>
                        </li>
                        </ul>
                        <ul class="navbar-nav">
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
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form role="form" id="create-request">
                            <div class="form-group text-center">
                                <label for="subject">
                                    <h2>Create New User</h2>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="emp_name">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i> | Full Name :
                                </label>
                                <input class="form-control input-sm" id="emp_name"
                                    placeholder="Type User's FullName Please.." required />
                            </div>

                            <div class="form-group">
                                <label for="emp_num">
                                    <i class="fa fa-phone-square " aria-hidden="true"></i> | Phone Number
                                </label>
                                <input class="form-control input-sm" id="emp_num" placeholder="993333XXX" required />
                            </div>

                            <div class="form-group">
                                <label for="emp_id">
                                    <i class="fa fa-location-arrow"></i> | Employee ID
                                </label>
                                <input class="form-control input-sm" id="emp_id" type="tel"
                                    placeholder="Type User's ID...." required="" />
                            </div>

                            <div class="form-group">
                                <label for="Date">
                                    <i class="fa fa-user"></i> | Username :
                                </label>
                                <input class="form-control input-sm" id="username" type="text"
                                    placeholder="Type a User Name Please.." required="" />
                            </div>

                            <div class="form-group">
                                <label for="From">
                                    <i class="fa fa-lock"></i> | Password :
                                </label>
                                <input class="form-control input-sm" id="password" type="password" class="input"
                                    data-type="password" placeholder="Type a password.." autocomplete='off'
                                    required="" />
                            </div>

                            <div class="form-group">
                                <label for="To">
                                    <i class="fa fa-calendar-check-o"></i> | Email :
                                </label>
                                <input type="email" class="form-control input-sm" id="email"
                                    placeholder="User Email (X.X@Rand.sy)" required="" />
                            </div>


                            <!--============================================Validation Alerts======================================-->
                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger1"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>FullName" At least 6 characters !</b></span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger2"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>Please Enter a Mobile number !<b></span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger3"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center">ID Only Numbers !</span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger4"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>Username At least 6 characters !</b></span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger5"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>Password At least 8 characters !</b></span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger6"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>Please Enter a Valid Email !</b></span>
                            </div>


                            <!--============================================Alert======================================-->
                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"><b>✍...Check</b> all fields...✍️</span>
                            </div>

                            <div class="alert alert-success alert-dismissable text-center" id="alert_success"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center"> Added Succesfuly ...</span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="error"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span class="text-center">Error !!! user not added...!!!</span>
                            </div>
                            &nbsp;
                            &nbsp;
                            <!--============================================Button======================================-->
                            <div class="text-center">
                                <button class="btn btn-outline-info btn-block" id="Save" onclick="create_user()"
                                    type="button"><i class="fa fa-envelope-open" aria-hidden="true"></i> |
                                    Register</button>
                            </div>
                            &nbsp;
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <footer class="footer">
                            <div class="text-center">
                                <img src="images/rand.png" width="25" height="25" class="d-inline-block align-top">
                                <span class="text-muted"><a href="mailto:Rand-ITSupport@rand.sy">&copy; 2020-2021
                                        Created By
                                        Rand IT support</a></span>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
</body>
<!--===============================================================================================-->
<script type="text/javascript" src="js/jquery-3.3.1.min.js?v=3.3.1"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/bootstrap.min.js?v=4.4.1"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/tether.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/popper.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/moment.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/tempusdominus-bootstrap-4.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/_Create_User.js"></script>
<!--===============================================================================================-->

</html>
<?php
}
?>