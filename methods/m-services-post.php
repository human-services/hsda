<?php$route = '/services/';$app->post($route, function ()  use ($app){ 	$ReturnObject = array(); 	$request = $app->request();	$_GET = $request->params();	$clean = filter_input_array(INPUT_POST,$_GET);	if(isset($clean['name']))		{		$id = getGUID();			if(isset($clean['organization_id'])){ $organization_id = $clean['organization_id']; } else { $organization_id = '';}		if(isset($clean['program_id'])){ $program_id = $clean['program_id']; } else { $program_id = '';}		if(isset($clean['location_id'])){ $location_id = $clean['location_id']; } else { $location_id = '';}		if(isset($clean['name'])){ $name = $clean['name']; } else { $name = '';}		if(isset($clean['alternate_name'])){ $alternate_name = $clean['alternate_name']; } else { $alternate_name = '';}		if(isset($clean['url'])){ $url = $clean['url']; } else { $url = '';}		if(isset($clean['email'])){ $email = $clean['email']; } else { $email = '';}		if(isset($clean['status'])){ $status = $clean['status']; } else { $status = '';}		if(isset($clean['application_process'])){ $application_process = $clean['application_process']; } else { $application_process = '';}		if(isset($clean['wait_time'])){ $wait_time = $clean['wait_time']; } else { $wait_time = '';}		$slug = PrepareFileName($name);			$query = "INSERT INTO service(";		$query .= "id,";		$query .= "organization_id,";		$query .= "program_id,";		$query .= "location_id,";		$query .= "name,";		$query .= "alternate_name,";		$query .= "url,";		$query .= "email,";		$query .= "status,";		$query .= "application_process,";		$query .= "wait_time";		$query .= ") VALUES(";		$query .= "'" . mysql_real_escape_string($id) . "',";		$query .= "'" . mysql_real_escape_string($organization_id) . "',";		$query .= "'" . mysql_real_escape_string($program_id) . "',";		$query .= "'" . mysql_real_escape_string($location_id) . "',";		$query .= "'" . mysql_real_escape_string($name) . "',";		$query .= "'" . mysql_real_escape_string($alternate_name) . "',";		$query .= "'" . mysql_real_escape_string($url) . "',";		$query .= "'" . mysql_real_escape_string($email) . "',";		$query .= "'" . mysql_real_escape_string($status) . "',";		$query .= "'" . mysql_real_escape_string($application_process) . "',";		$query .= "'" . mysql_real_escape_string($wait_time) . "'";		$query .= ")";		//echo $query;		mysql_query($query) or die('Query failed: ' . mysql_error());		$F = array();		$F['id'] = $id;		$F['organization_id'] = $organization_id;		$F['program_id'] = $program_id;		$F['location_id'] = $location_id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$F['url'] = $url;		$F['email'] = $email;		$F['status'] = $status;		$F['application_process'] = $application_process;		$F['wait_time'] = $wait_time;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>