<?php
function __autoload($class_name){
	$path = explode('_', $class_name);
    $filePath = implode(DIRECTORY_SEPARATOR, $path) . '.php';
    require_once($filePath);
}
$config = new application_Config();
$config->setConfig(array(
	'dbName' => "test.db",
	'dbUser' => "root")
);			
$route = new core_Router();
$route->start();