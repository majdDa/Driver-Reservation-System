<?php
header('X-Frame-Options: deny');
header("Content-Security-Policy: default-src 'none';");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");


require_once('__Fun.php');
//////////////////////////////////////reject action give "is_approve"column the value=2
$id = test_input($_POST["id"]);
$arrCol = array("is_approve");
$arrVal = array("2");
update("new_reqs", $arrCol, $arrVal, "id = '" . $id . "'");

echo 1;