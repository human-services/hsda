<?php$route = '/locations/:location_id/services/';$app->post($route, function ($location_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$clean = filter_input_array(INPUT_POST,$_GET);	$location_id = mysql_real_escape_string($location_id);		if(isset($clean['name']))		{		$service_id = getGUID();				$name = $clean['name'];		$alternate_name = $clean['alternate_name'];			$query = "INSERT INTO service(";			$query .= "location_id,";		$query .= "id,";		$query .= "name,";		$query .= "alternate_name";		$query .= ") VALUES(";		$query .= "'" . mysql_real_escape_string($location_id) . "',";		$query .= "'" . mysql_real_escape_string($service_id) . "',";		$query .= "'" . mysql_real_escape_string($name) . "',";		$query .= "'" . mysql_real_escape_string($alternate_name) . "'";		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$F = array();		$F['location_id'] = $location_id;		$F['id'] = $service_id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$ReturnObject = $F;		}			$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>