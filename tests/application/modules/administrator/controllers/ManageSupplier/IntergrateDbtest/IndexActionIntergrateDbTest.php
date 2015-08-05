<?php

/**
 * @author Tran Van Hoang<butdatac@gmail.com>
 * test action index in manage supplier controller when having data
 */
class IndexActionIntergrateDbTest extends Vms_Test_PHPUnit_ControllerWithDatabaseFixturesTestCase {

    protected $truncateFixturesWhenTearDown = false;

    /**
     * Initialing data to test action index
     */
    protected function getDataSet() {
        return new PHPUnit_Extensions_Database_DataSet_ArrayDataSet([
            "Banner" => [
                [
                    "BannImage" => "Trần Văn Hoàng"
                ],[
                    "BannImage" => "Trần Văn Thắng"
                ],[
                    "BannImage" => "Trần Tuấn Anh"
                ]
                
            ]
        ]);
    }

    /**
     * test execute action index and access to index manage supplier page is ok
     */
    public function testExecuteActionIndex() {
        $this->dispatch("/administrator/manage-supplier");
        $this->assertResponseCode(200);
    }

    /**
     * test index manage supplier page display exactly the number of record
     */
}
