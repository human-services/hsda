<?php$route = '/locations/:location_id/services/';$app->post($route, function ($location_id)  use ($app){ 	$ReturnObject = array(); 	$request = $app->request();	$_GET = $request->params();	$_BODY = $request->getBody();	$_BODY = json_decode($_BODY,true);		$clean = filter_var_array($_BODY,FILTER_SANITIZE_STRING);		$location_id = filter_var($location_id, FILTER_SANITIZE_STRING);		if(isset($clean['name']))		{		$id = getGUID();			$organization_id = filter_var($_BODY['organization_id'], FILTER_SANITIZE_STRING);		$program_id = filter_var($_BODY['program_id'], FILTER_SANITIZE_STRING);		$name = filter_var($_BODY['name'], FILTER_SANITIZE_STRING);		$alternate_name = filter_var($_BODY['alternate_name'], FILTER_SANITIZE_STRING);		$url = filter_var($_BODY['url'], FILTER_SANITIZE_STRING);		$email = filter_var($_BODY['email'], FILTER_SANITIZE_STRING);		$status = filter_var($_BODY['status'], FILTER_SANITIZE_STRING);		$application_process = filter_var($_BODY['application_process'], FILTER_SANITIZE_STRING);		$wait_time = filter_var($_BODY['wait_time'], FILTER_SANITIZE_STRING);		$description = filter_var($_BODY['description'], FILTER_SANITIZE_STRING);		$slug = PrepareFileName($name);			$query = "INSERT INTO service(";		$query .= "id,";		$query .= "organization_id,";		$query .= "program_id,";		$query .= "name,";		$query .= "alternate_name,";		$query .= "url,";		$query .= "email,";		$query .= "status,";		$query .= "application_process,";		$query .= "wait_time";		$query .= ") VALUES(";		$query .= "'" . mysql_real_escape_string($id) . "',";		$query .= "'" . mysql_real_escape_string($organization_id) . "',";		$query .= "'" . mysql_real_escape_string($program_id) . "',";		$query .= "'" . mysql_real_escape_string($name) . "',";		$query .= "'" . mysql_real_escape_string($alternate_name) . "',";		$query .= "'" . mysql_real_escape_string($url) . "',";		$query .= "'" . mysql_real_escape_string($email) . "',";		$query .= "'" . mysql_real_escape_string($status) . "',";		$query .= "'" . mysql_real_escape_string($application_process) . "',";		$query .= "'" . mysql_real_escape_string($wait_time) . "'";		$query .= ")";		//echo $query;		mysql_query($query) or die('Query failed: ' . mysql_error());		$service_id = mysql_insert_id();		  		$LinkQuery = "SELECT * FROM service_at_location WHERE location_id = '" . mysql_real_escape_string($location_id) . "' AND service_id = '" . mysql_real_escape_string($service_id) . "'";		//echo $LinkQuery . "<br />";		$LinkResult = mysql_query($LinkQuery) or die('Query failed: ' . mysql_error());				if(mysql_num_rows($LinkResult)==0)			{				$query = "UPDATE service_at_location SET description = '" . mysql_real_escape_string($description) . "' WHERE location_id = '" . mysql_real_escape_string($location_id) . "' AND service_id = '" . mysql_real_escape_string($service_id) . "'";			//echo $query . "<br />";			mysql_query($query) or die('Query failed: ' . mysql_error());							}		else 			{			$query = "INSERT INTO service_at_location(location_id,service_id,description) VALUES('" . mysql_real_escape_string($location_id) . "','" . mysql_real_escape_string($service_id) . "','" . mysql_real_escape_string($description) . "')";			//echo $query . "<br />";			mysql_query($query) or die('Query failed: ' . mysql_error());						}				$F = array();		$F['id'] = $id;		$F['organization_id'] = $organization_id;		$F['program_id'] = $program_id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$F['url'] = $url;		$F['email'] = $email;		$F['status'] = $status;		$F['application_process'] = $application_process;		$F['wait_time'] = $wait_time;		$F['description'] = $description;				$ReturnObject = $F;		}			$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>