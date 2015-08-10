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

        $this->view->headTitle('Quản lý nhà cung cấp|Fashion');
        $this->_helper->_layout->setLayout('not-seo');
    }

    /**
     * this method will show list supplier profile
     */
    public function indexAction() {
        $supplierMapper = $this->__dbMapper;
        $this->view->suppliers = $supplierMapper->getAllRecords();
    }

    /**
     * this method will delete suppler profile
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

    /**
     * edit supplier profile
     */
    public function editAction() {
        $request = $this->getRequest();
        $id = (int) $request->getParam('id');
        $formEditSupplier = new Administrator_Form_EditSupplier();
        $supplierMapper = $this->__dbMapper;

        if ($request->isPost()) {
            $data = $request->getPost();
            
            //check valid form
            if (!$formEditSupplier->isValid($data)) {
                $id = (int) $request->getParam('SuppId');
            }
            
            //if user click edit and close, page will be redirected to index
            //after inserting data
            if (isset($data['editandclose'])) {
                unset($data['editandclose']);
                $supplierMapper->edit($data);
                $this->_helper->redirector('index');
            }
            
            unset($data['edit']);
            $supplierMapper->edit($data);
        }

        //if parameter id doesn't exist, page will be redirected to index immediately
        if (!$id) {
            $this->_helper->redirector('index');
            return;
        }

        //if id doesn't exist on database, page will be redirected to index immediately
        $supplier = $supplierMapper->getRecord($id);
        if (!$supplier) {
            $this->_helper->redirector('index');
            return;
        }

        //populate form
        $formEditSupplier->populate($supplier->toArray());
        $this->view->formEditSupplier = $formEditSupplier;
    }
    
    /**
     * create supplier profile
     */
    public function createAction(){
        
    }

}
