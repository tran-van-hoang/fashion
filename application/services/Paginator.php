<?php

/**
 * @author TranVanHoang
 * paginator
 */
class Application_Service_Paginator {

    private $__dbMapper;
    private $__currentPageNumber;
    private $__itemPerPage;

    /**
     * paginate
     * @param \dbMapper $dbMapper
     * @param integer $currentPageNumber
     * @param integer $itemPerPage
     * @return Zend_Paginator
     */
    public function __construct($dbMapper, $currentPageNumber, $itemPerPage) {
        $this->__setDbMapper($dbMapper);
        $this->__setCurrentPageNumber($currentPageNumber);
        $this->__setItemPerPage($itemPerPage);

        return $this->__paginate();
    }

    /**
     * @param string $dbMapper
     */
    private function __setDbMapper($dbMapper) {
        $this->__dbMapper = $dbMapper;
    }

    /**
     * @param integer $currentPageNumber
     */
    private function __setCurrentPageNumber($currentPageNumber) {
        $this->__currentPageNumber = $currentPageNumber;
    }

    /**
     * @param integer $itemPerPage
     */
    private function __setItemPerPage($itemPerPage) {
        $this->__itemPerPage = $itemPerPage;
    }

    /**
     * paginate
     * @param int $currentPageNumber
     * @param int $itemPerPage
     * @return Zend_Paginator
     */
    private function __paginate() {
        $dbMapper = $this->__getDbMapper();
        $currentPageNumber = $this->__getCurrentPageNumber();
        $itemPerPage = $this->__getItemPerPage();

        $select = $dbMapper->select();
        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($currentPageNumber);
        $paginator->setItemCountPerPage($itemPerPage);
        $paginator->setView();

        return $paginator;
    }

    /**
     * @return \dbMapper
     */
    private function __getDbMapper() {
        return $this->__dbMapper;
    }

    /**
     * @return integer
     */
    private function __getCurrentPageNumber() {
        return $this->__currentPageNumber;
    }

    /**
     * @return integer
     */
    private function __getItemPerPage() {
        return $this->__itemPerPage;
    }

}
