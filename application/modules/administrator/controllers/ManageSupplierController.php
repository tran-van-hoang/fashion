<?php

/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * manage supplier
 */
class Administrator_ManageSupplierController extends Zend_Controller_Action {

    /**
     * @var Administrator_Model_SupplierMapper 
     */
    private static $__dbMapper;

    public function init() {
        $this->view->headTitle('Quản lý nhà cung cấp|Fashion');
        $this->_helper->_layout->setLayout('not-seo');
    }

    /**
     * @return Administrator_Model_SupplierMapper
     */
    private function __getDbMapper() {
        if (!self::$__dbMapper) {
            self::$__dbMapper = new Administrator_Model_SupplierMapper();
        }

        return self::$__dbMapper;
    }

    /**
     * this method will show list supplier profile
     */
    public function indexAction() {
        $supplierMapper = $this->__getDbMapper();
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
        $supplierMapper = $this->__getDbMapper();
        $supplierMapper->delete($id);

        //redirected to index
        $this->_helper->redirector('index');
    }

    /**
     * edit supplier profile
     */
    public function editAction() {
        $request = $this->getRequest();
//        $id = (int) $request->getParam('id');
//        $supplierMapper = $this->__getDbMapper();
        $editSupplierForm = 'Administrator_Form_EditSupplier';
        $formEditSupplier = new Application_Form_FormFactory($editSupplierForm);
        $formEditSupplier->populate(['SuppName'=>'Trần Văn Hoang']);




        if ($request->isPost()) {
            $data = $request->getPost();
            //check valid form
            if (!$formEditSupplier->isValid($data)) {
                echo "hello world";
                $id = (int) $request->getParam('SuppId');
            }

//            //if user click edit and close, page will be redirected to index
//            //after inserting data into database
//            if (isset($data['editandclose'])) {
//                unset($data['editandclose']);
//                $supplierMapper->edit($data);
//                $this->_helper->redirector('index');
//            }
//            
//            //if user only click edit, data also inserted but it is'nt redirected
//            //to index
//            unset($data['edit']);
//            $supplierMapper->edit($data);
        }

//        //if parameter id doesn't exist, page will be redirected to index immediately
//        if (!$id) {
//            $this->_helper->redirector('index');
//            return;
//        }

        //if id doesn't exist on database, page will be redirected to index immediately
//        $supplier = $supplierMapper->getRecord($id);
//        if (!$supplier) {
//            $this->_helper->redirector('index');
//            return;
//        }
//
//        populate form
//        $formEditSupplier->populate($supplier->toArray());
        $this->view->formEditSupplier = $formEditSupplier;
    }

    /**
     * create supplier profile
     */
    public function createAction() {
        
    }

}
