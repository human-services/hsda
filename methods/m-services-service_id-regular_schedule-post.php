<?php$route = '/services/:service_id/regular_schedule/';$app->post($route, function ($service_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$clean = filter_input_array(INPUT_POST,$_GET);		$service_id = mysql_real_escape_string($service_id);		if(isset($clean['weekday']))		{		$regular_schedule_id = getGUID();		$weekday = $clean['weekday'];		$opens_at = $clean['opens_at'];		$closes_at = $clean['closes_at'];		$query = "INSERT INTO regular_schedule(";				$query .= "service_id,";		$query .= "id,";		$query .= "weekday,";		$query .= "opens_at,";		$query .= "closes_at";		$query .= ") VALUES(";		$query .= "'" . mysql_real_escape_string($service_id) . "',";		$query .= "'" . mysql_real_escape_string($regular_schedule_id) . "',";		$query .= "'" . mysql_real_escape_string($weekday) . "',";		$query .= "'" . mysql_real_escape_string($opens_at) . "',";		$query .= "'" . mysql_real_escape_string($closes_at) . "'";		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$F = array();		$F['service_id'] = $service_id;		$F['id'] = $regular_schedule_id;		$F['weekday'] = $weekday;		$F['opens_at'] = $opens_at;		$F['closes_at'] = $closes_at;		$ReturnObject = $F;		}			$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>