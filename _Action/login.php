<?php session_start();
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');



$_SESSION['csrf_token'] = $_POST['token'];
if (!isset($_POST['token'])) {
	echo '<script>window.location="index.php"</script>';
} else {
	require_once('__Fun.php');
	$pss = test_input($_REQUEST['pss']);
	$row = get_all("users", "`Username`='" . test_input($_REQUEST['uss']) . "' and Password='" . $pss . "' ");
	if (sizeof($row) == 1) {
		foreach ($row as $row) {
			$_SESSION['us'] = $row["Username"];
			$_SESSION['ps'] = $row["Password"];
			$_SESSION['ust'] = $row["User_type"];

			echo 1;
		}
	} else {
		echo 0;
	}
}