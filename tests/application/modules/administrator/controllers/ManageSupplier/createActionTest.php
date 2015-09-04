<?php
/**
 * @author Tran Van Hoang <butdatac@gmail.com>
 * test createAction in manageSupplier controller when having no data
 */
//class CreateActionManageSupplierTest extends Zend_Test_PHPUnit_ControllerTestCase {
//
//    public function setUp() {
//        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
//        parent::setUp();
//    }
//    
//    /**
//     * test access to create supplier page is ok
//     */
//    public function testAccessToCreateSupplierPage(){
//        $this->dispatch('/administrator/manage-supplier/create');
//        $this->assertResponseCode(200);
//    }
//    
//    /**
//     * test form create have full essential element
//     */
//    public function testDisplayFormCreateSupplierProfile(){
//        $this->dispatch('/administrator/manage-supplier/create');
//        
//        $this->assertQueryCount('form#createSupplier', 1);
//        $this->assertQueryCount('input[name="SuppName"]', 1);
//        $this->assertQueryCount('input[name="SuppAddress"]', 1);
//        $this->assertQueryCount('input[name="SuppFacebook"]', 1);
//        $this->assertQueryCount('input[name="SuppPhone"]', 1);
//        $this->assertQueryCount('input[name="SuppEmail"]', 1);
//        $this->assertQueryCount('input[name="SuppFax"]', 1);
//        $this->assertQueryCount('input[name="create"]', 1);
//    }
//}