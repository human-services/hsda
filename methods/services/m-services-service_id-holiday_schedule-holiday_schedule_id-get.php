<?php$route = '/services/:service_id/holiday-schedule/:holiday_schedule_id/';$app->get($route, function ($service_id,$holiday_schedule_id)  use ($app){	$ReturnObject = array();	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$holiday_schedule_id = filter_var($holiday_schedule_id, FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM holiday_schedule WHERE id = '" . $holiday_schedule_id . "' AND service_id = '" . $service_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{					$location_id = $Database['location_id'];		$service_at_location_id = $Database['service_at_location_id'];		$closed = $Database['closed'];		$opens_at = $Database['opens_at'];		$closes_at = $Database['closes_at'];		$start_date = $Database['start_date'];		$end_date = $Database['end_date'];		$F = array();		$F['id'] = $holiday_schedule_id;		$F['service_id'] = $service_id;		$F['location_id'] = $location_id;		$F['service_at_location_id'] = $service_at_location_id;		$F['closed'] = $closed;		$F['opens_at'] = $opens_at;		$F['closes_at'] = $closes_at;		$F['start_date'] = $start_date;		$F['end_date'] = $end_date;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>