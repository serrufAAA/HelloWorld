<?php
function __autoload($class_name){
	$path = explode('_', $class_name);
    $filePath = implode("/", $path) . '.php';
    require_once($filePath);
}
$config = new Application_Config();
$config->setConfig(array(
	'dbName' => "test.db",
	'dbUser' => "root")
);			
$route = new core_Router();
$route->start();