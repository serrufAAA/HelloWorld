<?php
class core_BDClient
{
	const DB_NAME = "test.db";
	private $db;
	
	static private $_instance = null;
	
	private function __construct($dbName, $dbUser, $dbPass)
	{
		$this->db = new Core_DbAdapter("mysql:host=localhost;dbname=" .$dbName . "", $dbUser, $dbPass);
	}
	
	static function getInstance($dbName='', $dbUser='', $dbPass='')
	{
		if (self::$_instance == null) {
			self::$_instance = new core_BDClient($dbName, $dbUser, $dbPass);
		}
		return self::$_instance;
	}

	public function getDb(){
		return $this->db;
	}
}
?>