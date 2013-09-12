<?php
function __autoload($class_name){
	$path = explode('_', $class_name);
    $filePath = implode("/", $path) . '.php';
    require_once($filePath);
}
$config = new Application_Config();
$config->setConfigDb(array(
	'dbName' => "test.db",
	'dbUser' => "root",
	 'dbPass' => "")
);	
$config->setConfigProf(true);		
$route = new core_Router();
$route->start();