<?php$route = '/services/:service_id/locations/:location_id/';$app->delete($route, function ($service_id,$location_id)  use ($app){	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$location_id = filter_var($location_id, FILTER_SANITIZE_STRING);	$Query = "DELETE FROM service_at_location WHERE location_id = '" . mysql_real_escape_string($location_id) . "' AND service_id = '" . mysql_real_escape_string($service_id) . "'";	mysql_query($Query) or die('Query failed: ' . mysql_error());	$ReturnObject = array();	$ReturnObject['message'] = "Location was removed from this service.";	$ReturnObject['service_id'] = $service_id;	$ReturnObject['location_id'] = $location_id;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>