<?php$route = '/organizations/:organization_id/funding/:funding_id/';$app->put($route, function ($organization_id,$funding_id)  use ($app){	$request = $app->request();	$_GET = $request->params();			$organization_id = mysql_real_escape_string($organization_id);	$funding_id = mysql_real_escape_string($funding_id);	$source = mysql_real_escape_string($_GET['source']);	$query = "UPDATE funding SET ";	$query .= "organization_id='" . mysql_real_escape_string($organization_id) . "'";	$query .= ",id='" . mysql_real_escape_string($funding_id) . "'";	$query .= ",source='" . mysql_real_escape_string($source) . "'";	$query .= " WHERE id = '" . $funding_id . "'";	mysql_query($query) or die('Query failed: ' . mysql_error());	$F = array();		$F['id'] = $funding_id;	$F['organization_id'] = $organization_id;	$F['source'] = $source;			$ReturnObject = $F;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>