<?php

/**
 * @author Tran Van Hoang<butdatac@gmail.com>
 * test action delete in manage supplier controller
 */
class DeleteActionTest extends ExtendPHPUnit_IntegratingDatabaseForTesting {

    /**
     * This variable contain the files name of input data file
     * @var array 
     */
    protected $_inputDataFilesName = [
        'InputDataSupplier.xml'
    ];

    /**
     * test when call delete action without id, page will be only
     * redirected to index manager supplier page 
     */
    public function testDeleteWithOutId() {
        $this->dispatch('/administrator/manage-supplier/delete');
        $this->assertResponseCode(302);
    }

    /**
     * test when call delete action with id is string, page will be only
     * redirected to index manager supplier page 
     */
    public function testDeleteWithIdIsString() {
        $this->dispatch('/administrator/manage-supplier/delete/id/mot');
        $this->assertResponseCode(302);
    }

    /**
     * test when call delete action with id is number, if id doesn't exist on
     * database, data will be intact. 
     */
    public function testDeleteWithIdDoesNotExist() {
        $this->dispatch('/administrator/manage-supplier/delete/id/6');

        //check if page is reditected
        $this->assertResponseCode(302);

        //turn to index manage supplier page to check record is intact
        $this->resetRequest()
                ->resetResponse();
        $this->dispatch('/administrator/manage-supplier');
        $this->assertQueryCount('table tbody tr', 3);
    }

    /**
     * test when call delete action with valid id and id exist on database,
     * record with this id will be deleted
     */
    public function testDeleteWithIdExist() {
        $this->dispatch('/administrator/manage-supplier/delete/id/1');
        //check if page is reditected
        $this->assertResponseCode(302);

        //turn to index manage supplier page to check record is deleted
        $this->resetRequest()
                ->resetResponse();
        $this->dispatch('/administrator/manage-supplier');
        $this->assertQueryCount('table tbody tr', 2);
    }

}
