<?php$route = '/organizations/:organization_id/programs/:program_id/services/:service_id/';$app->get($route, function ($organization_id,$program_id,$service_id)  use ($app){	$ReturnObject = array();		$organization_id = filter_var($organization_id, FILTER_SANITIZE_STRING);		$program_id = filter_var($program_id, FILTER_SANITIZE_STRING);	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM service WHERE id = '" . $service_id . "' AND organization_id = '" . $organization_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$id = $Database['id'];		$organization_id = $Database['organization_id'];		$program_id = $Database['program_id'];		$location_id = $Database['location_id'];		$name = $Database['name'];		$alternate_name = $Database['alternate_name'];		$url = $Database['url'];		$email = $Database['email'];		$status = $Database['status'];		$application_process = $Database['application_process'];		$wait_time = $Database['wait_time'];		$F = array();		$F['id'] = $id;		$F['organization_id'] = $organization_id;		$F['program_id'] = $program_id;		$F['location_id'] = $location_id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$F['url'] = $url;		$F['email'] = $email;		$F['status'] = $status;		$F['application_process'] = $application_process;		$F['wait_time'] = $wait_time;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>