<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 */
class Administrator_Model_SupplierMapper extends Application_Model_Factory_MapperFactory {

    /**
     * set db mapper
     */
    public function __construct() {
        $this->setDbTable('Administrator_Model_DbTable_Supplier');
    }

    /**
     * get all the record of supplier
     * @return Administrator_Model_DbTable_Supplier;
     */
    public function getAllSupplierRecords() {
        $dbMapper = $this->getDbTable();
        return $dbMapper->fetchAll();
    }

}
