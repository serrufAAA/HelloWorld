<?php
function __autoload($class_name){
	$path="";
	if(strpos($class_name, "Controller")){
		$path="application/controllers/";
	} elseif(strpos($class_name, "Model")){
		$path="application/models/";
	} elseif(strpos($class_name, "View")){
		$path="application/views/";
	} else {
		$path="core/";
	}
	$filePath=$path.$class_name.".php";
	require_once $filePath;
}
$route = new Router();
$route->start();