<?php$route = '/services/:service_id/interpretation-services/';$app->get($route, function ($service_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$service_id = strip_tags(mysql_real_escape_string($service_id));	$ReturnObject = array();	$Query = "SELECT * FROM interpretation_services WHERE service_id = '" . $service_id . "'";	$Query .= " ORDER BY fee ASC";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$interpretation_services_id = $Database['id'];		$fee = $Database['fee'];		$F = array();			$F['id'] = $interpretation_services_id;		$F['service_id'] = $service_id;		$F['fee'] = $fee;					array_push($ReturnObject,$F);				}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));		});?>