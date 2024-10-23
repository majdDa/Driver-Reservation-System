<?php   /* when lunching , should activate URL in Send_MT_Syriatel func */
date_default_timezone_set("Asia/Damascus");
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');
$url1 = $_SERVER['REQUEST_URI'];
header("Refresh: 10; URL=$url1"); // auto refresh every 30 minutes*/

require_once('../_Action/__Fun.php');
error_reporting(1);

$current_date = date('Y-m-d');
$admin_gsm = '963993333632'; //Admin GSM
$driver_gsm = '963993333643'; // Driver GSM

$now = time();
$thirty_minutes = $now + (30 * 60);
$startDate = date('H:i', $now);
$msg_date = date('H:i', $thirty_minutes);

echo "current Time :" . $startDate . '</br>';
echo "+30 minutes :" . $msg_date . '</br>';

$row = get_all("new_reqs", "status=0 limit 1");
if (sizeof($row) > 0) {
	foreach ($row as $row) {
		$is_approve = $row['is_approve'];
		$id = $row["id"];
		$gsm = $row["requester_num"]; // get the requester GSM
		$requester_name = $row["requester_name"];
		$location = $row['location'];

		if ($is_approve == 2) {
			$rejected_msg = 'عذرا .. تم رفض طلب التوصيل الخاص بك و شكرا';
			echo "rejected_msg : " . $rejected_msg . '</br>';
			$g1 = Send_MT_Syriatel('963' . $gsm, $rejected_msg);
			status_update('new_reqs', $id);
		} else {
			$row_ = get_all("new_reqs", "is_approve=1 and request_date='" . $current_date . "' and time_from like '" . $msg_date . "%'");
			foreach ($row_ as $row_) {
				$time_from = $row_['time_from'];
				$requester_alert_sms = 'تمت الموافقة على طلب التوصيل الخاص بك  و سيتم تواجد السائق خلال نصف ساعة . يرجى التواصل مع السائق لاعلامه بمكان تواجدك عبر الرقم : ' . $driver_gsm;
				echo $requester_alert_sms;
				$g1 = Send_MT_Syriatel('963' . $gsm, $requester_alert_sms);  // send 1 sms for each one (before 30 minute)
				$driver_alert_sms = 'عزيزي السائق .. لديك طلب توصيل خلال نصف ساعة ، يرجى اصطحاب السيد/ة : ' . $requester_name . ' الى :' . $location . ' للتواصل : ' . $gsm;
				echo $driver_alert_sms;
				$g2 = Send_MT_Syriatel($driver_gsm, $driver_alert_sms);

				status_update('new_reqs', $id);
				sending_log($requester_name, $gsm, $time_from, $requester_alert_sms, $g1, $driver_alert_sms, $g2);
			}
		}
	}
} else {
	echo 'No Requestes with status=0';
}