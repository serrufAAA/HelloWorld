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
$info = core_QueryInfo::getInstance();
if($infoObject = $info->getInfo()){
    $totalTime = 0;
    foreach($infoObject as $row){
        echo "Запрос " . $row->sql . " Время " . $row->time . " мсек<br>";
        $totalTime+=$row->time;
    }
echo "Суммарное время {$totalTime} мсек<br>";
}
