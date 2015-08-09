<?php

class Zend_Layout_Helper_Header extends Zend_Controller_Action_Helper_Abstract{
    public function renderHeader(){
        $this->view->header = 'header';
    }
}