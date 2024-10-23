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
    <title>Rand | Driver interface</title>
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
                            <li class="nav-item active">
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
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home </a>
                        </li>
                        <li class="nav-item active">
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
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <form role="form" id="create-request">


                            <div class="form-group text-center">

                                <label for="subject">
                                    <h2>Driver Request</h2>
                                </label>

                            </div>
                            <div class="form-group">

                                <label for="Name">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i> | Requester Name :
                                </label>
                                <input class="form-control input-sm" id="R_name" placeholder="Your Name Please.."
                                    maxlength="30" required />

                            </div>


                            <div class="form-group">
                                <label for="Number">
                                    <i class="fa fa-phone-square " aria-hidden="true"></i> | Requester Num :
                                </label>
                                <input class="form-control input-sm" id="R_num" placeholder="993333XXX" maxlength="9"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="Location">
                                    <i class="fa fa-location-arrow"></i> | Location :
                                </label>
                                <input class="form-control input-sm" id="location"
                                    placeholder="type where you need to go...." required /></input>
                            </div>

                            <div class="form-group">

                                <label for="Date">
                                    <i class="fa fa-calendar"></i> | Date:
                                </label>
                                <div class="col-form-label input-group date" id="datetimepicker6"
                                    data-target-input="nearest">
                                    <input type="text" id="Date" class="form-control input-sm datetimepicker-input"
                                        data-target="#datetimepicker6" placeholder="Select Date...." required />
                                    <div class="input-group-append" data-target="#datetimepicker6"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <label for="From">
                                    <i class="fa fa-calendar-minus-o"></i> | From:
                                </label>
                                <div class="col-form-label input-group date" id="datetimepicker7"
                                    data-target-input="nearest">
                                    <input type="text" id="D_from" class="form-control input-sm datetimepicker-input"
                                        data-target="#datetimepicker7" placeholder="Select Time...." required />
                                    <div class="input-group-append" data-target="#datetimepicker7"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">

                                <label for="To">
                                    <i class="fa fa-calendar-check-o"></i> | To:
                                </label>
                                <div class="col-form-label input-group date" id="datetimepicker8"
                                    data-target-input="nearest">
                                    <input type="text" id="D_to" class="form-control input-sm datetimepicker-input"
                                        data-target="#datetimepicker8" placeholder="Select Time...." required />
                                    <div class="input-group-append" data-target="#datetimepicker8"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group row">
                                <label>
                                    &nbsp; &nbsp; <span class="fa fa-pencil-square-o"> </span> | Description :
                                </label>

                                <textarea id="Description" class="form-control input-sm" placeholder="Type.... "
                                    required></textarea>

                            </div>

                            <!--============================================Alert======================================-->


                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger1"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍️... Error !! Check Your Name ...️✍️</span>
                            </div>


                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger2"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check Your Number...✍️</span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger3"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check location...✍️</span>
                            </div>

                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger4"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check Date...✍️</span>
                            </div>
                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger5"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check Time From...✍️</span>
                            </div>
                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger6"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check Time To...✍️</span>
                            </div>
                            <div class="alert alert-danger alert-dismissable text-center" id="alert_danger"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>✍...Check all fields...✍️</span>
                            </div>
                            <div class="alert alert-success alert-dismissable text-center" id="alert_success"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span> Sended Dear... </span>
                            </div>
                            <div class="alert alert-danger alert-dismissable text-center" id="error"
                                style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> × </button>
                                <span>Error...!!!</span>
                            </div>

                            <button class="btn btn-outline-info btn-block" id="Save" onclick="insert()" type="button"><i
                                    class="fa fa-envelope-open" aria-hidden="true"></i> | Send</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
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
<!--===============================================================================================-->
<script type="text/javascript" src="js/jquery.min.js"></script>
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
<script type="text/javascript" src="js/_insert.js"></script>

</html>
<?php
}
?>