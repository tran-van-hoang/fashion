<?php

/**
 * @author Trần Văn Hoàng<butdatac@gmail.com>
 * test indexAction in manageSupplier controller when having data
 */
class IndexActionManageSupplierIntergrateDbTest extends Vms_Test_PHPUnit_ControllerWithDatabaseFixturesTestCase {

    protected $truncateFixturesWhenTearDown = true;

    /**
     * initializing data to test index action in manage supplier controller
     */
    protected function getDataSet() {
        return new PHPUnit_Extensions_Database_DataSet_ArrayDataSet([
            "Supplier" => [
                [
                    "SuppName" => "Trần Văn Hoàng",
                    "SuppAddress" => "Tsdsds",
                    "SuppFacebook"=>'dsds',
                    "SuppPhone"=>'01267618465',
                    "SuppEmail"=>"butdatac@gmail.com",
                    "SuppFax"=>"03913829328"
                ]
            ]
        ]);
    }

    /**
     * test execute indexAction is ok
     */
    public function testIndexActionIsOk() {
        $this->dispatch('/administrator/manage-supplier');
        $this->assertResponseCode(200);
    }

//
//    /**
//     * test title, "Thời trang cao cấp|Fashion" is true
//     */
//    public function testTitle() {
//        $this->dispatch('/administrator/manage-supplier');
//        $this->assertQueryContentContains('title', 'Quản lý nhà cung cấp|Fashion');
//    }
}
