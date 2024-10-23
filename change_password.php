<?php
session_start();
require_once('_Action/__Fun.php');

$username = $_SESSION["us"];
$curpass = $_POST['curpass'];
$newpass = hash("sha256", $_POST['newpass']);
$row = get_all("users", "Username='" . $username . "'");
if (sizeof($row) == 1) {
    foreach ($row as $row) {
        $password = $row["Password"];
        $usertype = $row["User_type"];
    }
    if (hash("sha256", $curpass) === $password) {
        goto Reset_pass;
    } else {
        echo 0;
    }
}

Reset_pass:
$arrVal = array("'" . $newpass . "'");
$arrCol = array("Password");
update("users", $arrCol, $arrVal, "Username='" . $username . "'");
echo 1;