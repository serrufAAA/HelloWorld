<?php
class application_Config
{

	function setConfig($arrayConfig){
		$connect = core_BDClient::getInstance($arrayConfig['dbName'], $arrayConfig['dbUser']);
	}
}