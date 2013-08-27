<?php
function __autoload($class_name){
	$path = explode('_', $class_name);
    $filePath = implode(DIRECTORY_SEPARATOR, $path) . '.php';
    require_once($filePath);
}
$route = new core_Router();
$route->start();