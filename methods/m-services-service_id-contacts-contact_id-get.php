<?php$route = '/services/:service_id/contacts/:contact_id/';$app->get($route, function ($service_id,$contact_id)  use ($app){	$ReturnObject = array();	$service_id = mysql_real_escape_string($service_id);	$contact_id = mysql_real_escape_string($contact_id);	$Query = "SELECT * FROM contact WHERE id = '" . $contact_id . "' AND service_id = '" . $service_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$id = $Database['id'];		$service_id = $Database['service_id'];		$name = $Database['name'];		$title = $Database['title'];		$department = $Database['department'];		$email = $Database['email'];		$F = array();		$F['id'] = $id;		$F['service_id'] = $service_id;		$F['name'] = $name;		$F['title'] = $title;		$F['department'] = $department;		$F['email'] = $email;					$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>