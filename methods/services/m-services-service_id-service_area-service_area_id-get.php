<?php$route = '/services/:service_id/service-area/:service_area_id/';$app->get($route, function ($service_id,$service_area_id)  use ($app){	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$service_area_id = filter_var($service_area_id, FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM service_area WHERE id = '" . $service_area_id . "' AND service_id = '" . $service_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$service_area = $Database['service_area'];		$description = $Database['description'];		$F = array();			$F['id'] = $service_area_id;		$F['service_id'] = $service_id;		$F['service_area'] = $service_area;			$F['description'] = $description;		$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>