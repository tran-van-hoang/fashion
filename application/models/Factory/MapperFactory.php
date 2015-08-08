<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * design template for DbMapper
 */
class Application_Model_Factory_MapperFactory {

    /**
     * @var 
     */
    private $_dbTable;

    /**
     * @param string $dbTable
     * @return optional
     */
    protected function getDbTable() {
        return $this->_dbTable;
    }

    /**
     * set db table
     * @param string $dbTable
     * @throws Exception
     */
    protected function setDbTable($dbTable) {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
    }

}
