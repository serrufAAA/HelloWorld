<?php
class core_ProfInfo{
	public $sql, $time;

	function __construct($sql, $time){
		$this->sql = $sql;
		$this->time = $time;
	}
}
?>