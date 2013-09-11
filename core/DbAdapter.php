<?php
class Core_DbAdapter extends PDO{
	public function __construct($dsn, $username = null, $password = null, $driver_options = array())
    {
        parent::__construct($dsn, $username, $password, $driver_options);
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('core_DbStatement', array($this)));
    }

    public function query($statement){
    	$start = microtime(true);
        $result = parent::query($statement);
        $end = microtime(true);
        $sql = $statement;
        $time = round(($end - $start)*1000, 1);
        $profName = core_QueryInfo::getInstance();
        $profName->setRow($sql, $time);
        return $result;
    }

}