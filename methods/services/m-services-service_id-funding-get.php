<?php$route = '/services/:service_id/funding/';$app->get($route, function ($service_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$service_id = filter_var($service_id, FILTER_SANITIZE_STRING);	$ReturnObject = array();	$Query = "SELECT * FROM funding WHERE service_id = '" . $service_id . "'";	$Query .= " ORDER BY source ASC";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$funding_id = $Database['id'];		$source = $Database['source'];		$F = array();			$F['id'] = $funding_id;		$F['service_id'] = $service_id;		$F['source'] = $source;					array_push($ReturnObject,$F);				}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));		});?>