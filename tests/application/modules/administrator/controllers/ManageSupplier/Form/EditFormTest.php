<?php

/**
 * test form edit supplier profile
 */
class EditFormTest extends Zend_Test_PHPUnit_ControllerTestCase {

    /**
     * @var Administrator_Form_EditSupplier 
     */
    private $__formTest;

    /**
     * setup form for test
     */
    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
        $this->__formTest = new Administrator_Form_EditSupplier();
    }

    /**
     * test when submit with all element having no data, it is false
     */
    public function testSubmitWithNoData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => '',
            'SuppAddress' => '',
            'SuppPhone' => '',
            'SuppEmail' => ''
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test submit with only element named SuppName having no data, it is also false
     */
    public function testOnlyElementNamedSuppNameHavingNoData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => '',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppPhone' => '01232323232',
            'SuppEmail' => 'butdatac@gmail.com'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test submit with only element named SuppAddress having no data, it is also false
     */
    public function testOnlyElementNamedSuppAddressHavingNoData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => '',
            'SuppPhone' => '01232323232',
            'SuppEmail' => 'butdatac@gmail.com'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test submit with only element named SuppPhone having no data, it is also false
     */
    public function testOnlyElementNamedSuppPhoneHavingNoData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppPhone' => '',
            'SuppEmail' => 'butdatac@gmail.com'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test submit with only element named SuppEmail having no data, it is also false
     */
    public function testOnlyElementNamedSuppEmailHavingNoData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppPhone' => '01232323232',
            'SuppEmail' => ''
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test when submit with bad data, it will be false
     */
    public function testSubmitWithBadData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => '3r3fđg4r34r3e3e3e3',
            'SuppAddress' => 'rưefdvv',
            'SuppPhone' => 'ẻưrẻ',
            'SuppEmail' => '423432423423ds',
            'SuppFax' => '423432qưdqw23ds'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test element named SuppPhone has the total of number less than 10 character
     */
    public function testSuppPhoneLessThan10Character() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppPhone' => '123456789',
            'SuppEmail' => 'butdatac@gmail.com'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test element named SuppPhone has the total of number more than 11 character
     */
    public function testSuppPhoneMoreThan10Character() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppPhone' => '12345678912345',
            'SuppEmail' => 'butdatac@gmail.com'
        ];
        $this->assertFalse($formTest->isValid($data));
    }

    /**
     * test inject good data will be true
     */
    public function testInjectGoodData() {
        $formTest = $this->__formTest;
        $data = [
            'SuppName' => 'Trần Văn Hoàng',
            'SuppAddress' => 'Trần Nguyên Hãn, Lê Chân, Hải Phòng',
            'SuppFacebook' => 'Trần Văn Hoàng',
            'SuppPhone' => '12345678912',
            'SuppEmail' => 'butdatac@gmail.com',
            'SuppFax' => '12345678912'
        ];
        $this->assertTrue($formTest->isValid($data));
    }

}
