<?php$route = '/services/:service_id/regular-schedule/:regular_schedule_id/';$app->get($route, function ($service_id,$regular_schedule_id)  use ($app){	$ReturnObject = array();		$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$regular_schedule_id = filter_var($regular_schedule_id, FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM regular_schedule WHERE id = '" . $regular_schedule_id . "' AND service_id = '" . $service_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{					$location_id = $Database['location_id'];		$service_at_location_id = $Database['service_at_location_id'];				$weekday = $Database['weekday'];		$opens_at = $Database['opens_at'];		$closes_at = $Database['closes_at'];		$F = array();		$F['id'] = $regular_schedule_id;		$F['location_id'] = $location_id;		$F['service_id'] = $service_id;		$F['service_at_location_id'] = $service_at_location_id;		$F['weekday'] = $weekday;		$F['opens_at'] = $opens_at;		$F['closes_at'] = $closes_at;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>