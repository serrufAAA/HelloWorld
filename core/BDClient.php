<?php
class core_BDClient
{
	const DB_NAME = "test.db";
	private $db;
	
	static private $_instance = null;
	
	private function __construct($dbName, $dbUser)
	{
		//$this->db = new PDO("mysql:host=localhost;dbname=test.db", "root", ""); 
		$this->db = new PDO("mysql:host=localhost;dbname=" .$dbName . "", $dbUser, "");
	}
	
	static function getInstance($dbName='', $dbUser='')
	{
		if (self::$_instance == null) {
			self::$_instance = new core_BDClient($dbName, $dbUser);
		}
		return self::$_instance;
	}

	public function getDb(){
		return $this->db;
	}
}
?>