<!DOCTYPE html>
<?php session_start();
require_once('_Action/header.php');
if (!isset($_SESSION["us"]) || !isset($_SESSION["ps"]) || !isset($_SESSION["ust"]) || !isset($_SESSION['csrf_token'])) {
    echo "<script>window.location='index.php'</script>";
} else {
    require_once('_Action/__Fun.php');
    error_reporting(0);
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta content="Source code generated using rand.sy" name="description" />
    <meta content="rand.sy" name="author" />
    <!---------------------------------------------------->
    <link href="./css/ico/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/_View.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/jquery.toast.css">
    <!--===============================================================================================-->

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
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
                            <li class="nav-item">
                                <a class="nav-link" href="Create.php">Create<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
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
                        <li class="nav-item">
                            <a class="nav-link" href="Create.php">Create<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
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
        &nbsp;
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form class="needs-validation text-center" novalidate>
                    <?php
                        $row = get_all("new_reqs", "`is_approve`!=4 ORDER BY `id` DESC LIMIT 25");
                        if (sizeof($row) == 0) {
                        ?>
                    <table class="table table-sm  table-responsive-sm table-bordered table-hover">
                        <thead style="background:#581845; color: white;">
                            <tr>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">#</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Requester Name</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Requester Num </th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Location</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Date</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">From</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">To</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Description</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Status</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Update</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Save</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" style="word-wrap: break-word;" scope="row" id="id"></th>
                                <td class="text-center" style="word-wrap: break-word;" id="requester_name"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="requester_num"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="location"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="requester_date"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="From"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="To"></td>
                                <td class="text-center" style="word-wrap: break-word;" id="Description"></td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="Status-<?php echo $row['id']; ?>"></td>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-info"
                                        onclick="update_row(<?php echo $row['id']; ?>)"
                                        id="Update-<?php echo $row['id']; ?>" disabled><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-success"
                                        id="Save-<?php echo $row['id']; ?>"
                                        onclick="Save_row(<?php echo $row['id']; ?>)" disabled><i class="fa fa-floppy-o"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-danger"
                                        id="Delete-<?php echo $row['id']; ?>"
                                        onclick="Delete_row(<?php echo $row['id']; ?>)" disabled><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="text-center"><br>...Nothing Found... </h3>
                    <?php
                        } else { ?>
                    <table class="table table-sm  table-bordered table-hover">
                        <thead style="background:#581845; color: white;">
                            <tr>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">#</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Requester Name</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Requester Num </th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Location</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Date</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">From</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">To</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Description</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Status</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Update</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Save</th>
                                <th scope="col" style="word-wrap: break-word;" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i = 0;
                                    foreach ($row as $row) {
                                        $i++; ?>
                            <tr>
                                <th class="text-center" style="word-wrap: break-word;" scope="row"
                                    id="id-<?php echo $row['id']; ?>">
                                    <?php echo $i; ?>
                                </th>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="requester_name-<?php echo $row['id']; ?>">
                                    <?php echo $row['requester_name']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="requester_num-<?php echo $row['id']; ?>">
                                    <?php echo $row['requester_num']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="location-<?php echo $row['id']; ?>">
                                    <?php echo $row['location']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="request_date-<?php echo $row['id']; ?>">
                                    <?php echo $row['request_date']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="time_from-<?php echo $row['id']; ?>">
                                    <?php echo $row['time_from']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="time_to-<?php echo $row['id']; ?>">
                                    <?php echo $row['time_to']; ?>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="description-<?php echo $row['id']; ?>">
                                    <?php echo $row['description']; ?>
                                </td>
                                <?php
                                            if ($row['is_approve'] == 0) { ?>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="Status-<?php echo $row['id']; ?>">
                                    <?php echo 'Wating for approval'; ?>
                                </td>
                                <?php
                                            }
                                            if ($row['is_approve'] == 1) { ?>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="Status-<?php echo $row['id']; ?>">
                                    <?php echo 'Approved'; ?>
                                </td>
                                <?php
                                            }
                                            if ($row['is_approve'] == 2) { ?>
                                <td class="text-center" style="word-wrap: break-word;"
                                    id="Status-<?php echo $row['id']; ?>">
                                    <?php echo 'Rejected'; ?>
                                </td>
                                <?php
                                            } ?>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-info"
                                        onclick="update_row(<?php echo $row['id']; ?>)"
                                        id="Update-<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-success"
                                        id="Save-<?php echo $row['id']; ?>"
                                        onclick="Save_row(<?php echo $row['id']; ?>)" disabled><i class="fa fa-floppy-o"
                                            aria-hidden="true"></i></button>
                                </td>
                                <td class="text-center" style="word-wrap: break-word;">
                                    <button type="button" class="btn btn-outline-danger"
                                        id="Delete-<?php echo $row['id']; ?>"
                                        onclick="Delete_row(<?php echo $row['id']; ?>)" disabled><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                                    }
                                } ?>
                    </table>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
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
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
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
<script type="text/javascript" src="js/jquery.toast.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="js/A_Action.js"></script>

</html>
<?php
}
?>