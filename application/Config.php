<?php
class application_Config
{

	public function setConfigDb($arrayConfig){
		$connect = core_BDClient::getInstance($arrayConfig['dbName'], $arrayConfig['dbUser'], $arrayConfig['dbPass']);
	}

	public function setConfigProf($boolFlag){
		$QueryInfoObject = core_QueryInfo::getInstance();
		$QueryInfoObject->boolFlag = $boolFlag;
	}
}