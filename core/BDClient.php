<?php
class core_BDClient
{
    const DB_NAME = "test.db";
    private $db;
    
    static private $_instance = null;
    
    private function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=test.db", "root", "");    
    }
    
    static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new core_BDClient();
        }
        return self::$_instance;
    }

    public function getDb(){
    	return $this->db;
    }
}
?>