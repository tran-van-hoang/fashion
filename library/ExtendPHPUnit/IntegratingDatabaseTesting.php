<?php

/**
 * This class will intergrate database for test, after testing it will remove all data
 */
abstract class ExtendPHPUnit_IntegratingDatabaseTesting extends Zend_Test_PHPUnit_ControllerTestCase {

    /**
     * you must overide this variable with the files name of input data which 
     * you want to set
     * @var array
     */
    protected $inputDataFilesName;

    /**
     * @var Zend_Test_PHPUnit_Db_Connection 
     */
    private static $connection;

    /**
     * @var Zend_Test_PHPUnit_Db_SimpleTester
     */
    private $databasesTester = array();

    /**
     * @var boolean
     */
    protected $truncateFixturesWhenTearDown = true;

    /**
     * 
     */
    protected function setUp() {
        $this->setUpBoostrap();
        parent::setUp();
        $this->setupDatabaseTesting();
    }

    /**
     * delete all data after testing
     */
    protected function tearDown() {
        if ($this->databasesTester) {
            foreach ($this->databasesTester as $databaseTester) {
                $databaseTester->onTearDown(); //default null operation - nothing to
            }
        }
        parent::tearDown();
    }

    /**
     * This method will intergate database for testing 
     */
    private function setupDatabaseTesting() {
        $connection = $this->dbConnect();
        $inputDataFilesName = $this->inputDataFilesName;
        //set data for each table
        foreach ($inputDataFilesName as $inputDataFileName) {
            $databaseTester = new Zend_Test_PHPUnit_Db_SimpleTester($connection);
            $databaseTester->getConnection()->getConnection()->query('SET foreign_key_checks = 0');
            $databaseFixture = new PHPUnit_Extensions_Database_DataSet_MysqlXmlDataSet(INPUT_DATA_TEST_PATH . $inputDataFileName);
            if ($this->truncateFixturesWhenTearDown) {
                $databaseTester->setTearDownOperation(new Zend_Test_PHPUnit_Db_Operation_Truncate()); // truncate database when call teardown
            }
            $databaseTester->setupDatabase($databaseFixture);
            $databasesTester[] = $databaseTester;
        }


        $this->databasesTester = $databasesTester;
    }

    /**
     * get instance of Zend_Test_PHPUnit_Db_Connection
     * @param Zend_Test_PHPUnit_ControllerTestCase $db
     * @return Zend_Test_PHPUnit_Db_Connection
     */
    private function dbConnect() {
        if (!self::$connection) {
            $db = $this->bootstrap->getBootstrap()->getResource('db');
            self::$connection = new Zend_Test_PHPUnit_Db_Connection($db, null);
        }
        return self::$connection;
    }

    /**
     * Init boostrap to controller test case
     *
     * Override this method if you want change init application evn
     */
    private function setUpBoostrap() {
        // Set configuration files
        $config = array(APPLICATION_PATH . '/configs/application.ini');
        if (file_exists(APPLICATION_PATH . '/configs/application.local.ini')) {
            $config[] = APPLICATION_PATH . '/configs/application.local.ini';
        }
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, array('config' => $config));
    }

}
