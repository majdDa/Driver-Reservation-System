<?php
//header('X-Frame-Options: deny');
//header("Content-Security-Policy: default-src 'none';");
header('X-Frame-Options: deny');
header("Content-Security-Policy: default-src 'none';");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");


require_once('__Fun.php');


$requester_name = test_input($_POST["requester_name"]);
$requester_num = test_input($_POST["requester_num"]);
$location = test_input($_POST["location"]);
$request_date = test_input($_POST["request_date"]);
$time_from = test_input($_POST["time_from"]);
$time_to = test_input($_POST["time_to"]);
$description = test_input($_POST["desc"]);

$gsm = '963993333649;963993333632;963993333607'; //Admin GSM
$alert = 'تم ادراج طلب توصيل جديد .. يرجى المراجعة ';
$g = Send_MT_Syriatel($gsm, $alert);

inbox_log($requester_name, $requester_num, $location, $request_date, $time_from, $time_to, $description, $alert, $g);


$columns = array("id", "requester_name", "requester_num", "location", "request_date", "time_from", "time_to", "description", "is_approve", "status");
$values = array(NULL, $requester_name, $requester_num, $location, $request_date, $time_from, $time_to, $description, 0, 0);
insert("new_reqs", $values, $columns);
echo 1;