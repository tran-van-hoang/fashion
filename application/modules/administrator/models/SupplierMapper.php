<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 */
class Administrator_Model_SupplierMapper extends Application_Model_Factory_MapperFactory implements Application_Model_Interface_MapperInterface {

    /**
     * overide this variable of parent class with the 
     * name of db table class to set db mapper
     * @var string
     */
    protected $_dbTable = 'Administrator_Model_DbTable_Supplier';

    /**
     * @return Administrator_Model_DbTable_Supplier
     */
    private function __getDbMapper() {
        return $this->_getDbTable();
    }

    public function create() {
        
    }

    /**
     * delete one record supplier profile on database
     * @param integer $id
     */
    public function delete($id) {
        $dbMapper = $this->__getDbMapper();
        $where = $dbMapper->getAdapter()->quoteInto('SuppId = ?', $id);
        $dbMapper->delete($where);
    }

    /**
     * 
     * @param integer $id
     */
    public function edit($data) {
        $dbMapper = $this->__getDbMapper();

        $where = $dbMapper->getAdapter()->quoteInto('SuppId = ?', $data['SuppId']);
        $dbMapper->update($data, $where);
    }

    /**
     * get all the record of supplier table
     * @return Administrator_Model_DbTable_Supplier;
     */
    public function getAllRecords() {
        $dbMapper = $this->__getDbMapper();
        return $dbMapper->fetchAll();
//        $currentPageNumber = 1;
//        $itemPerPage = 3;
//
//        return new Application_Service_Paginator($dbMapper, $currentPageNumber, $itemPerPage);
    }

    /**
     * get one record supplier profile from database
     * @param integer $id
     */
    public function getRecord($id) {
        $dbMapper = $this->__getDbMapper();
        return $dbMapper->find($id)->current();
    }

}
