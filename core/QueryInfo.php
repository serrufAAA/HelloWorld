<?php
class core_QueryInfo
{

	private $rows = array();
	
	static private $_instance = null;
	
	static function getInstance()
	{
		if (self::$_instance == null) {
			self::$_instance = new core_QueryInfo();
		}
		return self::$_instance;
	}

	public function setRow($sql, $time){
		$this->rows[]= new core_ProfInfo($sql, $time);
	}

	public function getInfo(){
		return $this->rows;
	}
}

?>