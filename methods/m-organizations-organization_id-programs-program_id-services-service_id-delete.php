<?php$route = '/organizations/:organization_id/programs/:program_id/services/:service_id';$app->delete($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	$Query = "DELETE FROM service WHERE slug = '" . $slug . "'";	mysql_query($Query) or die('Query failed: ' . mysql_error());	$ReturnObject = array();	$ReturnObject['message'] = "Service Deleted!";	$ReturnObject['slug'] = $slug;	$api->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>