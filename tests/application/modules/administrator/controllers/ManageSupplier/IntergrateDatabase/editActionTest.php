<?php

/**
 * @author Tran Van Hoang<butdatac@gmail.com>
 * test action edit in manage supplier controller
 */
//class EditActionTest extends ExtendPHPUnit_IntegratingDatabaseForTesting {
//
//    /**
//     * This variable contain the files name of input data file
//     * @var array 
//     */
//    protected $_inputDataFilesName = [
//        'InputDataSupplier.xml'
//    ];
//    protected $_truncateFixturesWhenTearDown = false;
//
//    /**
//     * test when call edit method without id, page will be redirected to
//     * index page
//     */
//    public function testCallEditMethodWithoutId() {
//        $this->dispatch('/administrator/manage-supplier/edit');
//        $this->assertResponseCode(302);
//        $this->assertRedirectTo('/administrator/manage-supplier');
//    }
//
//    /**
//     * test when call edit method with id is not a number, page will be redirected to
//     * index page
//     */
//    public function testCallEditMethodWithIdIsNotANumber() {
//        $this->dispatch('/administrator/manage-supplier/edit/id/mot');
//        $this->assertResponseCode(302);
//        $this->assertRedirectTo('/administrator/manage-supplier');
//    }
//
//    /**
//     * test call edit method with id is a number but id
//     * doesn't exist on database then page will be redirected to index page 
//     */
//    public function testCallEditWithIdDoesNotExist() {
//        $this->dispatch('/administrator/manage-supplier/edit/id/6');
//        $this->assertResponseCode(302);
//        $this->assertRedirectTo('/administrator/manage-supplier');
//    }
//
//    /**
//     * test form display exactly element
//     */
//    public function testFormDisplayExactly() {
//        $this->dispatch('/administrator/manage-supplier/edit/id/1');
//        
//        $this->assertQueryCount('form#editSupplier', 1);
//        $this->assertQueryCount('form#editSupplier input[name="SuppName"]', 1);
//        $this->assertQueryCount('form#editSupplier textarea[name="SuppAddress"]', 1);
//        $this->assertQueryCount('form#editSupplier input[name="SuppFacebook"]', 1);
//        $this->assertQueryCount('form#editSupplier input[name="SuppPhone"]', 1);
//        $this->assertQueryCount('form#editSupplier input[name="SuppEmail"]', 1);
//        $this->assertQueryCount('form#editSupplier input[name="SuppFax"]', 1);
//    }

//    /**
//     * test call edit with id exist, page will display information of 
//     * supplier
//     */
//    public function testCallEditWithIdExist() {
//        $this->dispatch('/administrator/manage-supplier/edit/id/1');
//        $this->assertResponseCode(200);
//
//        $this->assertQueryContentContains('body', 'Trần Văn Hoàng');
//        $this->assertQueryContentContains('body', 'Trần Nguyên Hãn, Lê Chân, Hải Phòng');
//        $this->assertQueryContentContains('body', 'Trần Văn Hoàng');
//        $this->assertQueryContentContains('body', '01267618465');
//        $this->assertQueryContentContains('body', 'butdatac@gmail.com');
//        $this->assertQueryContentContains('body', '01748329342');
//    }
//    /**
//     * test submit with no data will show warning massage
//     */
//    public function testSubmitWithoutData() {
//        $this->request->setMethod('POST')
//                ->setPost([
//                    'SuppId' => 1,
//                    'SuppName' => '',
//                    'SuppAddress' => '',
//                    'SuppPhone' => '',
//                    'SuppEmail' => ''
//        ]);
//        $this->dispatch('/administrator/manage-supplier/edit');
//
//        $this->assertQueryContentContains('li', 'Bạn cần nhập tên của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập địa chỉ của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập số điện thoại của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập email của nhà cung cấp');
//    }
//
//    /**
//     * test when submit form with bad data will show error message
//     */
//    public function testSubmitWithBadData() {
//        $this->request->setMethod('POST')
//                ->setPost([
//                    'SuppId' => 1,
//                    'SuppName' => '7trf4rewfwefwefwefwe',
//                    'SuppPhone' => '32rdwefefwefwef',
//                    'SuppEmail' => 'sdf3f3fewfdsdfsd',
//                    'SuppFax' => 'jf9edhfosd'
//        ]);
//
//        $this->dispatch('/administrator/manage-supplier/edit');
//
//        $this->assertQueryContentContains('li', 'Bạn cần nhập chính xác tên của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập chính xác số điện thoại của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập chính xác email của nhà cung cấp');
//        $this->assertQueryContentContains('li', 'Bạn cần nhập chính xác số fax của nhà cung cấp');
//    }
//
//    /**
//     * test when submit with good data, data will be inserted. If click edit
//     * page won't be redirected
//     */
//    public function testSubmitWithGoodDataAndClickEdit() {
//        $this->request->setMethod('POST')
//                ->setPost([
//                    'SuppId' => 1,
//                    'SuppName' => 'Lê Đức Anh',
//                    'SuppAddress' => 'Kiến An, Hải Phòng',
//                    'SuppFacebook' => 'Nguyen Du',
//                    'SuppPhone' => '0123456789',
//                    'SuppEmail' => 'butdatac@gmail.com',
//                    'SuppFax' => '12345678912',
//                    'edit' => 'edit'
//        ]);
//
//        $this->dispatch('/administrator/manage-supplier/edit');
//
//        //ensure that data updated by reset request and refresh again
//        $this->resetRequest()
//                ->resetResponse();
//        $this->dispatch('/administrator/manage-supplier/edit/id/1');
//
//        $this->assertQueryContentContains("body", 'Lê Đức Anh');
//        $this->assertQueryContentContains("body", 'Kiến An, Hải Phòng');
//        $this->assertQueryContentContains("body", 'Nguyen Du');
//        $this->assertQueryContentContains("body", '0123456789');
//        $this->assertQueryContentContains("body", 'butdatac@gmail.com');
//        $this->assertQueryContentContains("body", '12345678912');
//    }
//
//    /**
//     * test when submit with good data, data will be inserted. If click
//     * edit and close, page will be redirected
//     */
//    public function testSubmitWithGoodDataAndClickEditAndClose() {
//        $this->request->setMethod('POST')
//                ->setPost([
//                    'SuppId' => 1,
//                    'SuppName' => 'Lê Đức Anh',
//                    'SuppAddress' => 'Kiến An, Hải Phòng',
//                    'SuppFacebook' => 'Nguyen Du',
//                    'SuppPhone' => '0123456789',
//                    'SuppEmail' => 'butdatac@gmail.com',
//                    'SuppFax' => '12345678912',
//                    'editandclose' => 'editandclose'
//        ]);
//
//        $this->dispatch('/administrator/manage-supplier/edit');
//
//        //ensure that data updated by reset request and refresh again
//
//        $this->assertResponseCode(302);
//        $this->resetRequest()->resetResponse();
//        $this->dispatch('/administrator/manage-supplier');
//
//        $this->assertQueryContentContains("body", 'Lê Đức Anh');
//        $this->assertQueryContentContains("body", 'Kiến An, Hải Phòng');
//        $this->assertQueryContentContains("body", 'Nguyen Du');
//        $this->assertQueryContentContains("body", '0123456789');
//        $this->assertQueryContentContains("body", 'butdatac@gmail.com');
//        $this->assertQueryContentContains("body", '12345678912');
//    }
//
//}
