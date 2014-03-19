<?php
require_once('api_loader.php');

if(isset($_REQUEST['org_id']) && !empty($_REQUEST['module']) && !empty($_REQUEST['method'])){
	$api = new api_loader($_REQUEST['org_id']);
	
	$api->call_method($_REQUEST['module'], $_REQUEST['method']);
}