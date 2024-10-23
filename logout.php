<?php session_start();
require_once('_Action/header.php');
unset($_SESSION["us"]);
unset($_SESSION["ps"]);
session_destroy();
echo '<script>window.location="index.php";</script>';