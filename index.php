<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
ini_set('memory_limit','16M');
ini_set('max_execution_time', 300);
/* Router */
//$tokens = explode('/',rtrim($_SERVER['REQUEST_URI'], '/'));
$tokens = explode('/',rtrim(str_replace("p=","",$_SERVER['QUERY_STRING']), '/'));
/*
echo '<pre>';
	//print_r($_SERVER);
 print_r($tokens);
 echo '</pre>';*/
 
 // 2. Dispatcher
$pagename = ucfirst($tokens[0]);
if($tokens[0]==""){
	$pagename = "Opinion";
}



if (file_exists('controllers/'.$pagename.'Controller.php')) {
	require_once('controllers/'.$pagename.'Controller.php');
	$controllerName = $pagename."Controller";
	$controller = new $controllerName;
	if (isset($tokens[1])) {
		$actionName = $tokens[1];// . 'Action';
		
		if(isset($tokens[2])) {
			$controller->{$actionName}($tokens[2]);	
		}
		else {
			$controller->{$actionName}();
		}
	}
	else
	{
		// default action
		$controller->index();
	}				
}
else{
	die("Controller doesn't exists");
}