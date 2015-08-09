<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initPlaceholders() {
        $this->bootstrap('View');

        /* @var $view Zend_View */
        $view = $this->getResource('View');
        $view->doctype('XHTML1_STRICT');
        
        // Set the initial stylesheet:
        $headLink = $view->headLink();
        $headLink->prependStylesheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
        
        // Set the initial script:
        $headScript = $view->headScript();
        $headScript->appendFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', 'text/javascript');
    }

}
