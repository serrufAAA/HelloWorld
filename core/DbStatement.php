<?php
class core_DbStatement extends PDOStatement {

    protected $connection;
    protected $bound_params = array();

    protected function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function bindParam($paramno, &$param, $type = PDO::PARAM_STR)
    {
        $this->bound_params[$paramno] = array(
            'value' => &$param,
            'type' => $type,
        );

        $result = parent::bindParam($paramno, $param, $type);
    }

    public function getSQL()
    {
        $sql = $this->queryString;
        if (sizeof($this->bound_params)) {
            foreach ($this->bound_params as $key => $param) {
                $value = $param['value'];
                if (!is_null($param['type'])) {
                    $value = self::cast($value, $param['type']);
                }
                if (!is_null($value)) {
                    $sql = str_replace($key, $this->connection->quote($value), $sql);
                } else {
                    $sql = str_replace($key, 'NULL', $sql);
                }
            }
        }
        return $sql;
    }

    static protected function cast($value, $type)
    {
        switch ($type) {
            case PDO::PARAM_BOOL:
                return (bool)$value;
                break;
            case PDO::PARAM_NULL:
                return null;
                break;
            case PDO::PARAM_INT:
                return (int)$value;
            case PDO::PARAM_STR:
            default:
                return $value;
        }
    }

    public function execute($param = null) {
        $start = microtime(true);
        if(is_null($param)){
            $result = parent::execute();
        } else {
            $result = parent::execute($param);
        }
        $sql = $this->getSQL();
        $end = microtime(true);
        $time = round(($end - $start)*1000, 1);
        $profName = core_QueryInfo::getInstance();
        $profName->setRow($sql, $time);
        return $result;
    }

}
?>