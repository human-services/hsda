<?php$route = '/organizations/:organization_id/';$app->delete($route, function ($organization_id)  use ($app){	$organization_id = filter_var($organization_id, FILTER_SANITIZE_STRING);	$Query = "DELETE FROM organization WHERE id = '" . $organization_id . "'";	mysql_query($Query) or die('Query failed: ' . mysql_error());	$ReturnObject = array();	$ReturnObject['message'] = "Organization Deleted";	$ReturnObject['organization_id'] = $organization_id;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>