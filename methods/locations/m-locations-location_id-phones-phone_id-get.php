<?php$route = '/locations/:location_id/phones/:phone_id/';$app->get($route, function ($location_id,$phone_id)  use ($app){	$ReturnObject = array();	$location_id = mysql_real_escape_string($location_id);	$phone_id = mysql_real_escape_string($phone_id);	$Query = "SELECT * FROM phone WHERE id = '" . $phone_id . "' AND location_id = '" . $location_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$phone_id = $Database['id'];		$location_id = $Database['location_id'];		$service_id = $Database['service_id'];		$organization_id = $Database['organization_id'];		$contact_id = $Database['contact_id'];		$service_at_location_id = $Database['service_at_location_id'];		$number = $Database['number'];		$extension = $Database['extension'];		$type = $Database['type'];		$department = $Database['department'];		$language = $Database['language'];		$description = $Database['description'];		$F = array();		$F['id'] = $phone_id;		$F['location_id'] = $location_id;				$F['service_id'] = $service_id;		$F['organization_id'] = $organization_id;		$F['contact_id'] = $contact_id;		$F['service_at_location_id'] = $service_at_location_id;		$F['number'] = $number;		$F['extension'] = $extension;		$F['type'] = $type;		$F['department'] = $department;		$F['language'] = $language;		$F['description'] = $description;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>