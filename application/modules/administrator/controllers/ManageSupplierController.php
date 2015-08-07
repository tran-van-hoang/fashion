<?php

class Administrator_ManageSupplierController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->headTitle('Quản lý nhà cung cấp|Fashion');
        $this->_helper->_layout->setLayout('not-seo');
        
    }

}
