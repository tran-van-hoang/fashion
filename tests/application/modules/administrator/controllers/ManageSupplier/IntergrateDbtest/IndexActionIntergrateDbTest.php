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

    /**
     * test page display exactly the number of record supplier in database.
     * In this case it will display 'SuppName' field, 'SuppAddress' field,
     * 'SuppPhone' field, 'SuppEmail' field
     * @dataProvider inputTestDisplayRecords
     */
    public function testDisplayRecords($suppName,$suppAddress,$suppPhone,$suppEmail) {

        $this->dispatch('/administrator/manage-supplier');
        $this->assertQueryContentContains("body", $suppName);
        $this->assertQueryContentContains("body", $suppAddress);
        $this->assertQueryContentContains("body", $suppPhone);
        $this->assertQueryContentContains("body", $suppEmail);
    }

    public function inputTestDisplayRecords() {
        return [
            ['Trần Văn Hoàng', 'Trần Nguyên Hãn, Lê Chân, Hải Phòng', '01267618465', 'butdatac@gmail.com'],
            ['Trần Văn Thắng', 'Trần Nguyên Hãn, Lê Chân, Hải Phòng', '01267618468', 'vanthang@gmail.com'],
            ['Trần Tuấn Anh', 'Trần Nguyên Hãn, Lê Chân, Hải Phòng', '01267677775', 'tuananh@gmail.com']
        ];
    }

}
