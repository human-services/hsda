<?php$route = '/services/:service_id/regular-schedule/:regular_schedule_id/';$app->put($route, function ($service_id,$regular_schedule_id)  use ($app){	$request = $app->request();	$_BODY = $request->getBody();	$_BODY = json_decode($_BODY,true);		$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$regular_schedule_id = filter_var($regular_schedule_id, FILTER_SANITIZE_STRING);		$location_id = filter_var($_BODY['location_id'], FILTER_SANITIZE_STRING);	$service_at_location_id = filter_var($_BODY['service_at_location_id'], FILTER_SANITIZE_STRING);	$weekday = filter_var($_BODY['weekday'], FILTER_SANITIZE_STRING);	$opens_at = filter_var($_BODY['opens_at'], FILTER_SANITIZE_STRING);	$closes_at = filter_var($_BODY['closes_at'], FILTER_SANITIZE_STRING);	$query = "UPDATE regular_schedule SET ";	$query .= "service_id='" . mysql_real_escape_string($service_id) . "'";	$query .= ",location_id='" . mysql_real_escape_string($location_id) . "'";	$query .= ",service_at_location_id='" . mysql_real_escape_string($service_at_location_id) . "'";	$query .= ",weekday='" . mysql_real_escape_string($weekday) . "'";	$query .= ",opens_at='" . mysql_real_escape_string($opens_at) . "'";	$query .= ",closes_at='" . mysql_real_escape_string($closes_at) . "'";	$query .= " WHERE id = '" . $regular_schedule_id . "'";	//echo $query;	mysql_query($query) or die('Query failed: ' . mysql_error());	$F = array();	$F['id'] = $regular_schedule_id;	$F['location_id'] = $location_id;	$F['service_id'] = $service_id;	$F['service_at_location_id'] = $service_at_location_id;	$F['weekday'] = $weekday;	$F['opens_at'] = $opens_at;	$F['closes_at'] = $closes_at;	$ReturnObject = $F;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>