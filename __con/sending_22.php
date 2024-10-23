<?php    
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');



require_once('../_Action/__Fun.php');
error_reporting(1);

$date_by_h_m = date('H:i');
$current_date = date('Y-m-d ');
//echo $current_date . '<br>';

$now = time(); //returns the current time measured in the number of seconds
$thirty_minutes = $now + (30 * 60);
$startDate = date('H:i', $now);
$msg_date = date('H:i', $thirty_minutes);

echo "current Time :" . $startDate . '</br>';
echo "+30 minutes :" . $msg_date . '</br>';

$driver_gsm = '963993333649';
$row = get_all("new_reqs", "status=0 ");
//var_dump($row);
if (sizeof($row) > 0) {
    foreach ($row as $row) {
        $is_approve = $row['is_approve'];

        $row_ = get_all("new_reqs", "is_approve=1 and request_date='" . $current_date . "' and time_from like '" . $msg_date . "%'");
        var_dump($row_);
        foreach ($row_ as $row_) {
            $id = $row_["id"];
            $requester_name = $row_["requester_name"];
            $time_from = $row_['time_from'];
            $requester_gsm = $row_['requester_num']; // get the requester GSM

            echo "Request's Time : " . $time_from . '</br>';
            echo "Requester GSm : " . $requester_gsm . '</br>';

            $row_gsm = get_all("users", "User_type= 1"); // get the admin GSM
            foreach ($row_gsm as $row_gsm) {
                $admin_gsm = $row_gsm['Gsm'];
                echo "Admin GSm : " . $requester_gsm . '</br>';
            }
            echo "Driver GSm : " . $driver_gsm . '</br>'; // get the driver GSM
            echo ' Alert --> there is a request after 30 minutes' . '</br>';

            /////////////////////////////// send 1 sms for each one (before 30 minute)
            $requester_alert_sms = 'Hi requester ..';
            $g1 = Send_MT_Syriatel('963' . $requester_gsm, $requester_alert_sms);
            $driver_alert_sms = 'Hi Driver ..';
            $g2 = Send_MT_Syriatel($driver_gsm, $driver_alert_sms);


            status_update('new_reqs', $id);
        }
        $row_rej = get_all("new_reqs", "is_approve=2 and request_date='" . $current_date . "' and time_from like '" . $msg_date . "%'");
        foreach ($row_rej as $row_rej) {
            $id = $row_rej["id"];
            echo 'Rejected ..';

            status_update('new_reqs', $id);
        }
        if ($is_approve == 0) // pending request
        {
            echo 'waiting ..';
        }


        sending_log($requester_name, $requester_gsm, $time_from, $requester_alert_sms, $g1, $driver_alert_sms, $g2);
    }
} else {
    echo 'No Requestes with status=0';
}