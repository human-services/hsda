<?php$route = '/organizations/';$app->post($route, function ()  use ($app){  	$ReturnObject = array(); 	$request = $app->request();	$_GET = $request->params();	$_BODY = $request->getBody();	$_BODY = json_decode($_BODY,true);		$clean = filter_var_array($_BODY,FILTER_SANITIZE_STRING);	if(isset($clean['name']))		{		$id = getGUID();				if(isset($clean['name'])){ $name = $clean['name']; } else { $name = '';}		if(isset($clean['alternate_name'])){ $alternate_name = $clean['alternate_name']; } else { $alternate_name = '';}		if(isset($clean['description'])){ $description = $clean['description']; } else { $description = '';}		if(isset($clean['email'])){ $email = $clean['email']; } else { $email = '';}		if(isset($clean['url'])){ $url = $clean['url']; } else { $url = '';}		if(isset($clean['tax_status'])){ $tax_status = $clean['tax_status']; } else { $tax_status = '';}		if(isset($clean['tax_id'])){ $tax_id = $clean['tax_id']; } else { $tax_id = '';}		if(isset($clean['year_incorporated'])){ $year_incorporated = $clean['year_incorporated']; } else { $year_incorporated = '';}		if(isset($clean['legal_status'])){ $legal_status = $clean['legal_status']; } else { $legal_status = '';}				$slug = PrepareFileName($name);			$InsertQuery = "INSERT INTO organization(";			$InsertQuery .= "id,";		$InsertQuery .= "name,";		$InsertQuery .= "alternate_name,";		$InsertQuery .= "description,";		$InsertQuery .= "email,";		$InsertQuery .= "url,";		$InsertQuery .= "tax_status,";		$InsertQuery .= "tax_id,";		$InsertQuery .= "year_incorporated,";		$InsertQuery .= "legal_status";			$InsertQuery .= ") VALUES(";			$InsertQuery .= "'" . mysql_real_escape_string($id) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($name) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($alternate_name) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($description) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($email) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($url) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($tax_status) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($tax_id) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($year_incorporated) . "',";		$InsertQuery .= "'" . mysql_real_escape_string($legal_status) . "'";			$InsertQuery .= ")";		//echo $InsertQuery;		mysql_query($InsertQuery) or die('Query failed: ' . mysql_error());					$F = array();		$F['id'] = $id;		$F['name'] = $name;		$F['alternate_name'] = $alternate_name;		$F['description'] = $description;		$F['email'] = $email;		$F['url'] = $url;		$F['tax_status'] = $tax_status;		$F['tax_id'] = $tax_id;		$F['year_incorporated'] = $year_incorporated;		$F['legal_status'] = $legal_status;				$ReturnObject = $F;			}			$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>