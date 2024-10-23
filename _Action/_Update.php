<?php
header('X-Frame-Options: deny');
header("Content-Security-Policy: default-src 'none';");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");


require_once('__Fun.php');

$id = test_input($_POST["id"]);
$requester_name = test_input($_POST["requester_name"]);
$requester_num = test_input($_POST["requester_num"]);
$request_date = test_input($_POST["request_date"]);
$location = test_input($_POST["location"]);
$time_from = test_input($_POST["time_from"]);
$time_to = test_input($_POST["time_to"]);
$description = test_input($_POST["description"]);

$arrVal = array("'" . $requester_name . "'", "'" . $requester_num . "'", "'" . $request_date . "'", "'" . $location . "'", "'" . $time_from . "'", "'" . $time_to . "'", "'" . $description . "'");
$arrCol = array("requester_name", "requester_num", "request_date", "location", "time_from", "time_to", "description");
update("new_reqs", $arrCol, $arrVal, "id = '" . $id . "'");


echo 1;