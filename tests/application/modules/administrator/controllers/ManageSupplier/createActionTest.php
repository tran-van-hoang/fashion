<?php
/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * test createAction in manageSupplier controller when having no data
 */
class CreateActionManageSupplierTest extends Zend_Test_PHPUnit_ControllerTestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    /**
     * test access to create supplier page is ok
     */
    public function testAccessToCreateSupplierPage(){
        $this->dispatch('/administrator/manage-supplier/create');
        $this->assertResponseCode(200);
    }
    
    /**
     * test form create have full essential element
     */
    public function test(){
        
    }
}