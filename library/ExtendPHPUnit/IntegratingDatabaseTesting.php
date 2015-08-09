<?php

/**
 * This class will intergrate database for test. By default, it will 
 * remove all data after testing.<br><br>
 * <b>3 simple step:</b><br>
 * - First, extend this class.
 * - Second, you must difine variable INPUT_DATA_TEST_PATH in bootstrap.php in
 * testing enviroment like this:<br>
 * define('INPUT_DATA_TEST_PATH', APPLICATION_PATH.'/../tests/application/IntergrateDatabase/');.
 * This constant is path to folder which contain file data for testing.<br>
 * - Third, you must overive variable $_inputDataFilesName as the following:<br> 
 * "protected $_inputDataFilesName = ['FileDataTest1.xml','FileDataTest2.xml']".<br>
 * - You can tell program does not truncate data after testing by overiding
 * "protected $_truncateFixturesWhenTearDown = false".
 */
class ExtendPHPUnit_IntegratingDatabaseTesting extends Zend_Test_PHPUnit_ControllerTestCase {

    /**
     * you must overide this variable with the files name of input data which 
     * you want to set
     * @var array
     */
    protected $_inputDataFilesName;

    /**
     * @var Zend_Test_PHPUnit_Db_Connection 
     */
    private static $__connection;

    /**
     * @var array
     */
    private $__databasesTester;

    /**
     * you can overide this variable. If you set false, data will not be clean
     * after each testing.
     * @var boolean
     */
    protected $_truncateFixturesWhenTearDown = true;

    /**
     * 
     */
    protected function setUp() {
        $this->__setUpBoostrap();
        parent::setUp();
        $this->__setupDatabaseTesting();
    }
    
    /**
     * Initialling boostrap to controller test case
     */
    private function __setUpBoostrap() {
        // Set configuration files
        $config = array(APPLICATION_PATH . '/configs/application.ini');
        if (file_exists(APPLICATION_PATH . '/configs/application.local.ini')) {
            $config[] = APPLICATION_PATH . '/configs/application.local.ini';
        }
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, array('config' => $config));
    }

    /**
     * This method will intergate database for testing.
     */
    private function __setupDatabaseTesting() {
        $connection = $this->__dbConnect();
        $inputDataFilesName = $this->_inputDataFilesName;

        //begin set data for each table
        foreach ($inputDataFilesName as $inputDataFileName) {
            $databaseTester = new Zend_Test_PHPUnit_Db_SimpleTester($connection);
            $databaseTester->getConnection()
                    ->getConnection()
                    ->query('SET foreign_key_checks = 0');
            //get data from file
            $databaseFixture = new PHPUnit_Extensions_Database_DataSet_MysqlXmlDataSet(INPUT_DATA_TEST_PATH . $inputDataFileName);
            //if $_truncateFixturesWhenTearDown set be true, data will be clean
            //after each testing
            if ($this->_truncateFixturesWhenTearDown) {
                $databaseTester->setTearDownOperation(new Zend_Test_PHPUnit_Db_Operation_Truncate()); // truncate database when call teardown
            }

            $databaseTester->setupDatabase($databaseFixture);
            $databasesTester[] = $databaseTester;
        }
        //end set data for each table

        $this->__databasesTester = $databasesTester;
    }

    /**
     * get instance of Zend_Test_PHPUnit_Db_Connection
     * @param Zend_Test_PHPUnit_ControllerTestCase $db
     * @return Zend_Test_PHPUnit_Db_Connection
     */
    private function __dbConnect() {
        if (!self::$__connection) {
            $db = $this->bootstrap->getBootstrap()->getResource('db');
            self::$__connection = new Zend_Test_PHPUnit_Db_Connection($db, null);
        }
        return self::$__connection;
    }
    
    /**
     * delete all data after testing
     */
    protected function tearDown() {
        if ($this->__databasesTester) {
            foreach ($this->__databasesTester as $databaseTester) {
                $databaseTester->onTearDown(); //default null operation - nothing to
            }
        }
        parent::tearDown();
    }

}