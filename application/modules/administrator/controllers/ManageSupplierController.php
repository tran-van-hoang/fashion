<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * manage supplier
 */
class Administrator_ManageSupplierController extends Zend_Controller_Action {

    /**
     * @var Administrator_Model_SupplierMapper 
     */
    private $__dbMapper;

    public function init() {
        $this->__dbMapper = new Administrator_Model_SupplierMapper();
    }

    /**
     * this method will show list supplier profile
     */
    public function indexAction() {
        $this->view->headTitle('Quản lý nhà cung cấp|Fashion');
        $this->_helper->_layout->setLayout('not-seo');

        $supplierMapper = $this->__dbMapper;
        $this->view->suppliers = $supplierMapper->getAllRecords();
    }

    /**
     * this method will delete suppler profile if this  is valid
     */
    public function deleteAction() {
        $id = (int) $this->getParam('id');

        //if id doesn't exist, page will be redirected to index immediately
        if (!$id) {
            $this->_helper->redirector('index');
        }

        //if id is not a number, page will be redirected to index immediately
        if (!is_int($id)) {
            $this->_helper->redirector('index');
        }

        //call delete method
        $supplierMapper = $this->__dbMapper;
        $supplierMapper->delete($id);
        
        //redirected to index
        $this->_helper->redirector('index');
    }

}
