<?php$route = '/locations/:location_id/physical-address/:physical_address_id/';$app->get($route, function ($location_id,$physical_address_id)  use ($app){	$location_id = filter_var($location_id, FILTER_SANITIZE_STRING);	$physical_address_id = filter_var($physical_address_id, FILTER_SANITIZE_STRING);	$Query = "SELECT * FROM physical_address WHERE id = '" . $physical_address_id . "' AND location_id = '" . $location_id . "'";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$location_id = $Database['location_id'];		$physical_address_id = $Database['id'];		$attention = $Database['attention'];		$address_1 = $Database['address_1'];		$address_2 = $Database['address_2'];		$address_3 = $Database['address_3'];		$address_4 = $Database['address_4'];		$city = $Database['city'];		$state_province = $Database['state_province'];		$postal_code = $Database['postal_code'];		$country = $Database['country'];		$F = array();		$F['id'] = $physical_address_id;		$F['location_id'] = $location_id;				$F['attention'] = $attention;		$F['address_1'] = $address_1;		$F['address_2'] = $address_2;		$F['address_3'] = $address_3;		$F['address_4'] = $address_4;		$F['city'] = $city;		$F['state_province'] = $state_province;		$F['postal_code'] = $postal_code;		$F['country'] = $country;				$ReturnObject = $F;		}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>