<?php$route = '/organizations/:organization_id/programs/';$app->get($route, function ($organization_id)  use ($app){	$request = $app->request();	$_GET = $request->params();		$organization_id = strip_tags(mysql_real_escape_string($organization_id));	$ReturnObject = array();	$Query = "SELECT * FROM program WHERE organization_id = '" . $organization_id . "'";	$Query .= " ORDER BY name ASC";	//echo $Query;	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$program_id = $Database['id'];			$name = $Database['name'];		$alternate_name = $Database['alternate_name'];			$F = array();		$F['organization_id'] = $organization_id;		$F['id'] = $program_id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;				array_push($ReturnObject,$F);				}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));		});?>