<?php$route = '/contacts/';$app->get($route, function ()  use ($app){	$request = $app->request();	$_GET = $request->params();	if(isset($_GET['query'])){ $query = $_GET['query']; } else { $query = '';}	$ReturnObject = array();	if($query=='')		{		$Query = "SELECT * FROM contact WHERE name LIKE '%" . $query . "%'";		}	else		{		$Query = "SELECT * FROM contact";		}	$Query .= " ORDER BY name ASC";	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());	while ($Database = mysql_fetch_assoc($DatabaseResult))		{		$id = $Database['id'];		$organization_id = $Database['organization_id'];		$service_id = $Database['service_id'];		$name = $Database['name'];		$title = $Database['title'];		$department = $Database['department'];		$email = $Database['email'];		$F = array();		$F['id'] = $id;		$F['organization_id'] = $organization_id;		$F['service_id'] = $service_id;		$F['name'] = $name;		$F['title'] = $title;		$F['department'] = $department;		$F['email'] = $email;					array_push($ReturnObject,$F);				}	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>