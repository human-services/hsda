<?php$route = '/locations/:location_id/physical_address/:physical_address_id/';$app->put($route, function ($location_id,$physical_address_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$location_id = mysql_real_escape_string($location_id);	$physical_address_id = mysql_real_escape_string($physical_address_id);			$attention = mysql_real_escape_string($_GET['attention']);	$address_1 = mysql_real_escape_string($_GET['address_1']);	$address_2 = mysql_real_escape_string($_GET['address_2']);	$address_3 = mysql_real_escape_string($_GET['address_3']);	$address_4 = mysql_real_escape_string($_GET['address_4']);	$city = mysql_real_escape_string($_GET['city']);	$state_province = mysql_real_escape_string($_GET['state_province']);	$postal_code = mysql_real_escape_string($_GET['postal_code']);	$country = mysql_real_escape_string($_GET['country']);	$query = "UPDATE physical_address SET ";	$query .= "location_id='" . mysql_real_escape_string($location_id) . "'";	$query .= ",attention='" . mysql_real_escape_string($attention) . "'";	$query .= ",address_1='" . mysql_real_escape_string($address_1) . "'";	$query .= ",address_2='" . mysql_real_escape_string($address_2) . "'";	$query .= ",address_3='" . mysql_real_escape_string($address_3) . "'";	$query .= ",address_4='" . mysql_real_escape_string($address_4) . "'";	$query .= ",city='" . mysql_real_escape_string($city) . "'";	$query .= ",state_province='" . mysql_real_escape_string($state_province) . "'";	$query .= ",postal_code='" . mysql_real_escape_string($postal_code) . "'";	$query .= ",country='" . mysql_real_escape_string($country) . "'";	$query .= " WHERE id = '" . $physical_address_id . "'";	//echo $query;	mysql_query($query) or die('Query failed: ' . mysql_error());	$F = array();	$F['location_id'] = $location_id;	$F['id'] = $physical_address_id;	$F['attention'] = $attention;	$F['address_1'] = $address_1;	$F['address_2'] = $address_2;	$F['address_3'] = $address_3;	$F['address_4'] = $address_4;	$F['city'] = $city;	$F['state_province'] = $state_province;	$F['postal_code'] = $postal_code;	$F['country'] = $country;	$ReturnObject = $F;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>