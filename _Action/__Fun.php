<?php //////////////////////////////  Driver Requests interface
//date_default_timezone_set("Asia/Damascus"); // set time zone

function get_client_ip()
{
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if (getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if (getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if (getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if (getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if (getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}
function test_input($data)
{
	$data = str_replace('#', '', $data);
	$data = str_replace('&', '', $data);
	$data = str_replace(';', '', $data);
	$data = str_replace('!', '', $data);
	$data = str_replace('"', '', $data);
	$data = str_replace('$', '', $data);
	$data = str_replace('?', '', $data);
	$data = str_replace('%', '', $data);
	$data = str_replace("'", '', $data);
	$data = str_replace('(', '', $data);
	$data = str_replace(')', '', $data);
	$data = str_replace('*', '', $data);
	$data = str_replace('+', '', $data);
	$data = str_replace(',', '', $data);
	$data = str_replace('/', '', $data);
	$data = str_replace(':', '', $data);
	$data = str_replace('<', '', $data);
	$data = str_replace('=', '', $data);
	$data = str_replace('>', '', $data);
	$data = str_replace('?', '', $data);
	$data = str_replace('[', '', $data);
	$data = str_replace('\\', '', $data);
	$data = str_replace(']', '', $data);
	$data = str_replace('^', '', $data);
	$data = str_replace('`', '', $data);
	$data = str_replace('{', '', $data);
	$data = str_replace('|', '', $data);
	$data = str_replace('}', '', $data);
	$data = str_replace('~', '', $data);
	$data = str_replace("select", "", $data);
	$data = str_replace("SELECT", "", $data);
	$data = str_replace("update", "", $data);
	$data = str_replace("UPDATE", "", $data);
	$data = str_replace("delete", "", $data);
	$data = str_replace("DELETE", "", $data);
	$data = str_replace("union", "", $data);
	$data = str_replace("UNION", "", $data);
	$data = str_replace("from", "", $data);
	$data = str_replace("FROM", "", $data);
	$data = str_replace("concat", "", $data);
	$data = str_replace("CONCAT", "", $data);
	$data = str_replace("usrnam", "", $data);
	$data = str_replace("passwod", "", $data);
	$data = str_replace("cmslog", "", $data);
	$data = str_replace("drop", "", $data);
	$data = str_replace("DROP", "", $data);
	$data = str_replace(";", "", $data);
	$data = str_replace("--", "", $data);
	$data = str_replace("\0", "", $data);

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function insert($table_name, $values, $columns)
{

	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";
	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$sql = "insert into `" . $table_name . "`  (";
	for ($i = 0; $i < sizeof($columns); $i++) {
		$sql .= "`" . $columns[$i] . "`" . ',';
	}
	$sql = substr($sql, 0, -1);
	$sql .= ") ";
	$sql .= "VALUES (";

	for ($i = 0; $i < sizeof($values); $i++) {
		$sql .= "?,";
	}
	$sql = substr($sql, 0, -1);
	$sql .= ") ";
	//echo $sql;
	try {

		$stmt = $pdo->prepare($sql);
		for ($i = 0; $i < sizeof($values); $i++) {
			$stmt->bindParam($i + 1, $values[$i]);
		}
		$stmt->execute();
	} catch (Exception $e) {
		throw $e;
	}
}
/*
$columns=array("id","name","population");
$values=array(NULL,"Syria",55210054);
insert("countries",$values,$columns,$types);
*/


function get_all($table_name, $condition)
{
	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$stm = $pdo->query("select * from $table_name where $condition");
	//echo "select * from $table_name where $condition";
	$row = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

/*
$row=get_all("countries","1=1");
foreach($row as $row)
{
	echo $row["id"]." - ".$row["name"]." - ".$row["population"]."<br>";
}
 */

function delete($table_name, $condition)
{
	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$nrows = $pdo->exec("delete from $table_name where $condition");
}
/*
delete("countries","id=17");
*/


function update($table_name, $arrCol, $arrVal, $cond)
{

	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$sql = "update `" . $table_name . "`  set ";
	for ($i = 0; $i < sizeof($arrCol); $i++) {
		$sql .= $arrCol[$i] . '=' . $arrVal[$i] . ",";
	}
	$sql = substr($sql, 0, -1);
	$sql .= " where $cond";
	//echo $sql;
	$pdo->exec($sql);
}
/*
 $val='ayham112';
 $val="'".$val."'";
$arrVal=array($val);
$arrCol=array("name");
update("countries",$arrCol,$arrVal,"id = 1000");
*/



function get_count($table_name, $condition)
{
	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$stm = $pdo->query("select count(*) as s from $table_name where $condition");
	$row = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

/* 
$row=get_count("countries","1=1");
foreach($row as $row)
{
	echo $row["s"]."<br>";
}
*/



function get_distinct($table_name, $column_name, $condition)
{
	$dsn = "mysql:host=localhost;dbname=driver_requests";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	$stm = $pdo->query("select DISTINCT $column_name  from $table_name where $condition");
	$row = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

/*
$row=get_distinct("countries","name","1=1");
foreach($row as $row)
{
	echo $row["name"]."<br>";
}
 */


////////////////////////////////////// send sms response
function Send_MT_Syriatel($gsm, $sms)
{
	$code = '1253';
	$m1 = mb_convert_encoding((bin2hex(mb_convert_encoding($sms, 'UCS-2', 'UTF-8'))), 'UCS-2', 'UTF-8');
	$final_sms = iconv('UCS-2', 'UTF-8', $m1);
	$url = '';

	$url = "https://localhost/mt?orig={$code}&dest={$gsm}&msg={$final_sms}&res=C&type=1";
	$g = file_get_contents($url);
	return $g;
}

function status_update($table_name, $id)
{
	$arrVal = array(1);
	$arrCol = array("status");
	update("$table_name", $arrCol, $arrVal, "id = '" . $id . "'");
}


function sending_log($requester_name, $requester_gsm, $time_from, $requester_alert_sms, $g1, $driver_alert_sms, $g2)
{
	$log = "Date :" . $_SERVER['REMOTE_ADDR'] . '-' . date("Y-m-d, h:i:s") . PHP_EOL .
		"Requester Name : " . $requester_name . PHP_EOL .
		"Requester GSM :  : " . $requester_gsm . PHP_EOL .
		"Request Start Time :  : " . $time_from . PHP_EOL .
		"Requester Alert msg : " . $requester_alert_sms . PHP_EOL .
		"G1 : " . $g1 . PHP_EOL .
		"Driver Alert msg : " . $driver_alert_sms . PHP_EOL .
		"G2 : " . $g2 . PHP_EOL .

		"Date : " . date("Y-m-d") . PHP_EOL .

		"--------------------" . PHP_EOL;

	file_put_contents('..//_logs/sending/send_' . date("Y-m-d") . '.txt', $log, FILE_APPEND);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////

function approved_log($requester_name, $request_date, $time_from1, $time_to1, $driver_gsm, $alert, $g_)
{
	$log = "Date :" . $_SERVER['REMOTE_ADDR'] . '-' . date("Y-m-d, h:i:s") . PHP_EOL .
		"Requester Name : " . $requester_name . PHP_EOL .
		"Request Date : " . $request_date . PHP_EOL .
		"Request Start Time : " . $time_from1 . PHP_EOL .
		"Request End Time : " . $time_to1 . PHP_EOL .
		"Driver Gsm :  " . $driver_gsm . PHP_EOL .
		"Driver Alert msg : " . $alert . PHP_EOL .
		"G : " . $g . PHP_EOL .
		"Date : " . date("Y-m-d") . PHP_EOL .

		"--------------------" . PHP_EOL;

	file_put_contents('..//_logs/approved/approve_' . date("Y-m-d") . '.txt', $log, FILE_APPEND);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////

function inbox_log($requester_name, $requester_num, $location, $request_date, $time_from, $time_to, $description,$alert, $g)
{
	$log = "Date :" . $_SERVER['REMOTE_ADDR'] . '-' . date("Y-m-d, h:i:s") . PHP_EOL .
		"Requester Name : " . $requester_name . PHP_EOL .
		"Requester Number : " . $requester_num . PHP_EOL .
		"Location : " . $location . PHP_EOL .
		"Request Date: " . $request_date . PHP_EOL .
		"Request Start Time : " . date("H:i", strtotime($time_from)) . PHP_EOL .
		"Request End Time :  " . date("H:i", strtotime($time_to)) . PHP_EOL .
		"Description : " . $description . PHP_EOL .
		"alert : " . $alert . PHP_EOL .
		"G : " . $g . PHP_EOL .
		"Date : " . date("Y-m-d") . PHP_EOL .
		"--------------------" . PHP_EOL;
	file_put_contents('..//_logs/received/receive_' . date("Y-m-d") . '.txt', $log, FILE_APPEND);
}