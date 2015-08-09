<?php

class Administrator_Model_Supplier {

    protected $_suppId;
    protected $_suppName;
    protected $_suppAddress;
    protected $_suppFacebook;
    protected $_suppPhone;
    protected $_suppEmail;
    protected $_suppFax;

    /**
     * if you pass $options = ['suppName','suppAddress'];
     * this method will get the value of suppName and suppAddress
     * @param array $options
     */
    protected function getOptions(array $options) {
        
    }

    /**
     * if you pass $options = [
     *      'suppName'=>'tran van hoang',
     *      'suppAddress'=>'le chan, hai phong'
     * ];
     * this method will set suppName and suppAddress with value in array options
     * @param array $options
     */
    public function setOptions(array $options) {
        
    }

    /**
     * @return integer
     */
    public function getSuppId() {
        return $this->_suppId;
    }
    
    /**
     * @return string
     */
    public function getSuppName() {
        return $this->_suppName;
    }

    /**
     * @return string
     */
    public function getSuppAddress() {
        return $this->_suppAddress;
    }

    /**
     * @return string
     */
    public function getSuppFacebook() {
        return $this->_suppFacebook;
    }

    /**
     * @return string
     */
    public function getSuppPhone() {
        return $this->_suppPhone;
    }

    /**
     * @return string
     */
    public function getSuppEmail() {
        return $this->_suppEmail;
    }

    /**
     * @return string
     */
    public function getSuppFax() {
        return $this->_suppFax;
    }

    /**
     * @param integer $suppId
     */
    public function setSuppId($suppId) {
        $this->_suppId = $suppId;
    }

    /**
     * @param string $suppName
     */
    public function setSuppName($suppName) {
        $this->_suppName = $suppName;
    }

    /**
     * @param string $suppAddress
     */
    public function setSuppAddress($suppAddress) {
        $this->_suppAddress = $suppAddress;
    }

    /**
     * @param string $suppFacebook
     */
    public function setSuppFacebook($suppFacebook) {
        $this->_suppFacebook = $suppFacebook;
    }

    /**
     * 
     * @param string $suppPhone
     */
    public function setSuppPhone($suppPhone) {
        $this->_suppPhone = $suppPhone;
    }

    /**
     * @param string $suppEmail
     */
    public function setSuppEmail($suppEmail) {
        $this->_suppEmail = $suppEmail;
    }

    /**
     * @param string $suppFax
     */
    public function setSuppFax($suppFax) {
        $this->_suppFax = $suppFax;
    }

}
