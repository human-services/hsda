<?php$route = '/locations/:location_id/postal_address/';$app->get($route, function ($location_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$location_id = strip_tags(mysql_real_escape_string($location_id));	$ReturnObject = array();	$Query = "SELECT * FROM postal_address WHERE location_id = '" . $location_id . "'";	$Query .= " ORDER BY city ASC";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$postal_address_id = $Database['id'];		$attention = $Database['attention'];		$address_1 = $Database['address_1'];		$address_2 = $Database['address_2'];		$address_3 = $Database['address_3'];		$address_4 = $Database['address_4'];		$city = $Database['city'];		$state_province = $Database['state_province'];		$postal_code = $Database['postal_code'];		$country = $Database['country'];		$F = array();		$F['location_id'] = $location_id;		$F['id'] = $postal_address_id;		$F['attention'] = $attention;		$F['address_1'] = $address_1;		$F['address_2'] = $address_2;		$F['address_3'] = $address_3;		$F['address_4'] = $address_4;		$F['city'] = $city;		$F['state_province'] = $state_province;		$F['postal_code'] = $postal_code;		$F['country'] = $country;				array_push($ReturnObject,$F);				}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));		});?>