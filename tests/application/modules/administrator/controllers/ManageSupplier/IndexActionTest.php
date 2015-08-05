<?php
/**
 * test indexAction in manageSupplier controller when having no data
 */
class IndexActionManageSupplierTest extends Zend_Test_PHPUnit_ControllerTestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    /**
     * test execute indexAction is ok
     */
    public function testIndexActionIsOk(){
        $this->dispatch('/administrator/manage-supplier');
        $this->assertResponseCode(200);
    }
    
    /**
     * test title, "Thời trang cao cấp|Fashion" is true
     */
    public function testTitle(){
        $this->dispatch('/administrator/manage-supplier');
        $this->assertQueryContentContains('title', 'Quản lý nhà cung cấp|Fashion');
    }
//    
//    /**
//     * test when having no data, page will be reditected to 404 page
//     */
//    public function testWhenHavingNoDataPageWillBeRedirected(){
//        $this->dispatch('/administrator/manage-supplier');
//        $this->assertResponseCode(302);
//    }
    
}
