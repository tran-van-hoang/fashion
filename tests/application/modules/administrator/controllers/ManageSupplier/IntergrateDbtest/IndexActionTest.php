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
                    "SuppAddress" => 'Lê Chân, Hải Phòng',
                    "SuppFacebook" => 'Trần Văn Hoàng',
                    "SuppPhone" => '01267618465',
                    "SuppEmail" => 'butdatac@gmail.com',
                    'SuppFax' => '21212123232'
                ], [
                    "SuppName" => "Trần Văn Thắng",
                    "SuppAddress" => 'Lê Chân, Hải Phòng',
                    "SuppFacebook" => 'vanthang',
                    "SuppPhone" => '01267618488',
                    "SuppEmail" => 'vanthang@gmail.com',
                    'SuppFax' => '21212123232'
                ], [
                    "SuppName" => "Trần Tuấn Anh",
                    "SuppAddress" => 'Lê Chân, Hải Phòng',
                    "SuppFacebook" => 'tuananh',
                    "SuppPhone" => '01267686868',
                    "SuppEmail" => 'tuananh@gmail.com',
                    'SuppFax' => '21212123232'
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

    /**
     * test title, "Thời trang cao cấp|Fashion" is true
     */
    public function testTitle() {
        $this->dispatch('/administrator/manage-supplier');
        $this->assertQueryContentContains('title', 'Quản lý nhà cung cấp|Fashion');
    }


}
