<?php$route = '/organizations/:organization_id/programs/:program_id/services/:service_id/';$app->delete($route, function ($organization_id,$program_id,$service_id)  use ($app){	$organization_id = filter_var($organization_id, FILTER_SANITIZE_STRING);		$program_id = filter_var($program_id, FILTER_SANITIZE_STRING);	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$Query = "DELETE FROM service WHERE id = '" . $service_id . "' AND organization_id = '" . $organization_id . "' AND program_id = '" . $program_id . "'";	mysql_query($Query) or die('Query failed: ' . mysql_error());	$ReturnObject = array();	$ReturnObject['message'] = "Service Deleted!";	$ReturnObject['id'] = $service_id;	$ReturnObject['organization_id'] = $organization_id;	$ReturnObject['program_id'] = $program_id;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>