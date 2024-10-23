<!DOCTYPE html>
<?php
require_once('_Action/header.php');
session_start();

if (!isset($_SESSION["us"]) || !isset($_SESSION["ps"]) || !isset($_SESSION["ust"])|| !isset($_SESSION['csrf_token'])) {
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
	<title>Rand|Driver interface</title>
	<!--===============================================================================================-->
	<link href="images/rand.png" rel="shortcut icon" type="image/x-icon"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen"  href="css/bootstrap.min.css"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen"  href="css/tempusdominus-bootstrap-4.min.css" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen"  href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen"  href="css/Lato.css"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen"  href="css/Montserrat.css"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" media="screen" href="css/_Error.css" />
	</head>

	<body>
		<!-- Error Page -->
		<div class="container-floud">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<nav class="navbar sticky-top navbar-expand-lg navbar-dark navbar-fixed-top row" style="background:#581845;">
					<a class="navbar-brand">
						<img src="images/rand.png" width="30" height="30" class="d-inline-block align-top" alt="" /> Rand | Driver
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Create.php">Create<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Edit.php">View & Edit</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="A_Edit.php">A_View & Edit</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="View_Approval.php">Approval</a>
							</li>
						</ul>
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="Create_user.php">Create User <i class="fa fa-plus-circle " aria-hidden="true"></i><a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="logout.php">|&nbsp; &nbsp;logout <i class="fa fa-sign-out" aria-hidden="true"></i><a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="error">
				<div class="col-xs-12 ground-color text-center">
					<div class="container-error-404">
						<div class="clip">
							<div class="shadow"><span class="digit thirdDigit"></span></div>
						</div>
						<div class="clip">
							<div class="shadow"><span class="digit secondDigit"></span></div>
						</div>
						<div class="clip">
							<div class="shadow"><span class="digit firstDigit"></span></div>
						</div>
						<div class="msg">😯<span class="triangle"></span></div>
					</div>
					<h2 class="h1">Sorry! Calendar Page not Created yet....!!</h2>
					<h2>Call the IT-Section</h2>
				</div>
			</div>
			<div class="col-md-12">
				<footer class="footer">
					<div class="text-center">
						<img src="images/rand.png" width="25" height="25" class="d-inline-block align-top" />
						<span class="text-muted"><a href="mailto:Rand-ITSupport@rand.sy">&copy; 2020-2021 Created By Rand IT support.</a></span>
					</div>
				</footer>
			</div>
		</div>

	</body>
	<!-- This templates was made by Colorlib (https://colorlib.com) -->
	<script>
		function randomNum() {
			"use strict";
			return Math.floor(Math.random() * 9) + 1;
		}
		var loop1, loop2, loop3, time = 30,
			i = 0,
			number, selector3 = document.querySelector('.thirdDigit'),
			selector2 = document.querySelector('.secondDigit'),
			selector1 = document.querySelector('.firstDigit');
		loop3 = setInterval(function() {
			"use strict";
			if (i > 40) {
				clearInterval(loop3);
				selector3.textContent = 4;
			} else {
				selector3.textContent = randomNum();
				i++;
			}
		}, time);
		loop2 = setInterval(function() {
			"use strict";
			if (i > 80) {
				clearInterval(loop2);
				selector2.textContent = 0;
			} else {
				selector2.textContent = randomNum();
				i++;
			}
		}, time);
		loop1 = setInterval(function() {
			"use strict";
			if (i > 100) {
				clearInterval(loop1);
				selector1.textContent = 4;
			} else {
				selector1.textContent = randomNum();
				i++;
			}
		}, time);
	</script>

	</html>
<?php
}
?>