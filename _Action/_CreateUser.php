<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');


require_once('__Fun.php'); 
error_reporting(1);

$emp_name=test_input($_REQUEST["emp_name"]);
$emp_num=test_input($_REQUEST["emp_num"]);
$emp_id=test_input($_REQUEST["emp_id"]);
$username=hash("sha256",$_REQUEST["username"]);
$password=hash("sha256",$_REQUEST["password"]);
$email=test_input($_REQUEST["email"]);
//$password_=hash("sha256",$password);

$row=get_all("users","EmpID ='".$emp_id."' OR Gsm = '".$emp_num."' OR Username = '".$username."' ");
if(sizeof($row) > 0)
{
 echo 0;
}
else{
$columns=array("id","FullName","Gsm","EmpID","Username","Password","Email","User_type");
$values=array(NULL,$emp_name,$emp_num,$emp_id,$username,$password,$email,0);
insert("users",$values,$columns);
echo 1;		
}

?>