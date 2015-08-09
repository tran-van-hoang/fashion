<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * factory create object mapper
 */
class Application_Model_Factory_MapperFactory {

    /**
     * you <b><i>have to</i></b> overide this variable with the name of 
     * db table class
     * @var mixed 
     */
    protected $_dbTable;

    /**
     * @return mixed
     */
    protected function _getDbTable() {
        $this->__setDbTable();
        return $this->_dbTable;
    }

    /**
     * set db table with the table name was set by subclass
     * @param string $dbTable
     * @throws Exception
     */
    private function __setDbTable() {
        $dbTable = $this->_dbTable;
        //begin check valid
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        //end check valid
        
        $this->_dbTable = $dbTable;
    }

}
