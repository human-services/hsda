<?php$route = '/locations/:location_id/physical_address/';$app->post($route, function ($location_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$clean = filter_input_array(INPUT_POST,$_GET);		$location_id = mysql_real_escape_string($location_id);		if(isset($location_id))		{		$physical_address_id = getGUID();		$location_id = $clean['location_id'];		$attention = $clean['attention'];		$address_1 = $clean['address_1'];		$address_2 = $clean['address_2'];		$address_3 = $clean['address_3'];		$address_4 = $clean['address_4'];		$city = $clean['city'];		$state_province = $clean['state_province'];		$postal_code = $clean['postal_code'];		$country = $clean['country'];		$query = "INSERT INTO physical_address(";						$query .= "location_id,";		$query .= "id,";		$query .= "attention,";		$query .= "address_1,";		$query .= "address_2,";		$query .= "address_3,";		$query .= "address_4,";		$query .= "city,";		$query .= "state_province,";		$query .= "postal_code,";		$query .= "country";		$query .= ") VALUES(";		$query .= "'" . mysql_real_escape_string($location_id) . "',";		$query .= "'" . mysql_real_escape_string($physical_address_id) . "',";		$query .= "'" . mysql_real_escape_string($attention) . "',";		$query .= "'" . mysql_real_escape_string($address_1) . "',";		$query .= "'" . mysql_real_escape_string($address_2) . "',";		$query .= "'" . mysql_real_escape_string($address_3) . "',";		$query .= "'" . mysql_real_escape_string($address_4) . "',";		$query .= "'" . mysql_real_escape_string($city) . "',";		$query .= "'" . mysql_real_escape_string($state_province) . "',";		$query .= "'" . mysql_real_escape_string($postal_code) . "',";		$query .= "'" . mysql_real_escape_string($country) . "'";		$query .= ")";		mysql_query($query) or die('Query failed: ' . mysql_error());		$F = array();		$F['location_id'] = $location_id;		$F['id'] = $physical_address_id;		$F['attention'] = $attention;		$F['address_1'] = $address_1;		$F['address_2'] = $address_2;		$F['address_3'] = $address_3;		$F['address_4'] = $address_4;		$F['city'] = $city;		$F['state_province'] = $state_province;		$F['postal_code'] = $postal_code;		$F['country'] = $country;		$ReturnObject = $F;		}			$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>