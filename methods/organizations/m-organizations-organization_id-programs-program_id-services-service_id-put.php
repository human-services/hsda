<?php$route = '/organizations/:organization_id/programs/:program_id/services/:service_id/';$app->put($route, function ($organization_id,$program_id,$service_id)  use ($app){	$request = $app->request();	$_GET = $request->params();	$_BODY = $request->getBody();	$_BODY = json_decode($_BODY,true);			$organization_id = filter_var($organization_id, FILTER_SANITIZE_STRING);		$program_id = filter_var($program_id, FILTER_SANITIZE_STRING);	$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$location_id = filter_var($_BODY['location_id'], FILTER_SANITIZE_STRING);	$name = filter_var($_BODY['name'], FILTER_SANITIZE_STRING);	$alternate_name = filter_var($_BODY['alternate_name'], FILTER_SANITIZE_STRING);	$url = filter_var($_BODY['url'], FILTER_SANITIZE_STRING);	$email = filter_var($_BODY['email'], FILTER_SANITIZE_STRING);	$status = filter_var($_BODY['status'], FILTER_SANITIZE_STRING);	$application_process = filter_var($_BODY['application_process'], FILTER_SANITIZE_STRING);	$wait_time = filter_var($_BODY['wait_time'], FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM service WHERE id = '" . $service_id . "'";	//echo $Query;	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());	if($Database && mysql_num_rows($Database))		{		$query = "UPDATE service SET ";				$query .= "id='" . mysql_real_escape_string($service_id) . "'";		$query .= ",organization_id='" . mysql_real_escape_string($organization_id) . "'";		$query .= ",program_id='" . mysql_real_escape_string($program_id) . "'";		$query .= ",location_id='" . mysql_real_escape_string($location_id) . "'";				$query .= ",name='" . mysql_real_escape_string($name) . "'";		$query .= ",alternate_name='" . mysql_real_escape_string($alternate_name) . "'";		$query .= ",url='" . mysql_real_escape_string($url) . "'";		$query .= ",email='" . mysql_real_escape_string($email) . "'";		$query .= ",status='" . mysql_real_escape_string($status) . "'";		$query .= ",application_process='" . mysql_real_escape_string($application_process) . "'";		$query .= ",wait_time='" . mysql_real_escape_string($wait_time) . "'";		$query .= " WHERE id = '" . $service_id . "'";		//echo $query;		mysql_query($query) or die('Query failed: ' . mysql_error());		$F = array();		$F['id'] = $service_id;		$F['organization_id'] = $organization_id;		$F['program_id'] = $program_id;		$F['location_id'] = $location_id;				$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$F['url'] = $url;		$F['email'] = $email;		$F['status'] = $status;		$F['application_process'] = $application_process;		$F['wait_time'] = $wait_time;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>