<?php
header('X-Frame-Options: deny');
header("Content-Security-Policy: default-src 'none';");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
require_once('__Fun.php');

////////////////////////////////////// Approve action give "is_approve"column the value=1
$id = test_input($_POST["id"]);
$arrCol = array("is_approve");
$arrVal = array("1");
update("new_reqs", $arrCol, $arrVal, "id = '" . $id . "'");

$requester_name = test_input($_POST["requester_name"]);
$request_date = test_input($_POST["request_date"]);
$time_from = test_input($_POST["time_from"]);
$time_to = test_input($_POST["time_to"]);
///////////////////////////////////// Send alerting SMS to Driver to inform him about a new request
$driver_gsm = '963993333643';
$time_from1 = date("H:i", strtotime($time_from));
$time_to1 = date("H:i", strtotime($time_to));
$alert = 'لديك طلب توصيل جديد
بتاريخ ' . $request_date . '
من الساعة : ' . $time_from1 . 'الى الساعة :' . $time_to1 . 'باسم :' . $requester_name;



$g_ = Send_MT_Syriatel($driver_gsm, $alert);
approved_log($requester_name, $request_date, $time_from1, $time_to1, $driver_gsm, $alert, $g_);

$start_event = $request_date . " " . $time_from;
$end_event = $request_date . " " . $time_to;
$columns = array("id", "requester_name", "start_event", "end_event");
$values = array(NULL, $requester_name, $start_event, $end_event);
insert("events", $values, $columns, $types);

echo 1;