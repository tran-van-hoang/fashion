<?php

/**
 * @author Tran Van Hoang<butdatac@gmail.com>
 * test action index in manage supplier controller when having data
 */
class IndexActionIntergrateDbTest extends ExtendPHPUnit_IntegratingDatabaseTesting {

    /**
     *
     * @var boolean
     */
    protected $truncateFixturesWhenTearDown = false;

    /**
     * This variable contain the files name of input data file
     * @var array 
     */
    protected $inputDataFilesName = [
        'InputDataSupplier.xml'
    ];

    /**
     * test execute index action in manageSupplier controller is ok
     */
    public function testExecuteIndexAction() {
        $this->dispatch('/administrator/manage-supplier');
        $this->assertResponseCode(200);
    }

}
