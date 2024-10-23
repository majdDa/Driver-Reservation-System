<?php

//load.php
require_once('../_Action/__Fun.php'); 

$data = array();

$row=get_all("new_reqs","is_approve=1");

foreach($row as $row)
{
	$start=strtotime($row["request_date"]." ".$row["time_from"]);
	$start = date('H:i',$start);
	
	$end=strtotime($row["request_date"]." ".$row["time_to"]);
	$end = date('H:i',$end);
 $data[] = array(
  'id'   => $row["id"],
  'start'   => $row["request_date"]." ".$row["time_from"],
  'end'   => $row["request_date"]." ".$row["time_to"],
  
  'title'   => $row["requester_name"].' : From ('. $start .' To '. $end.')',
  'allDay' => false
 );
}

echo json_encode($data);

?>
