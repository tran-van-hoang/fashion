<?php

/**
 * Controller intergration with database
 *
 * Run flow
 * 1. You: setup db table data fixture on method XXX (System: will truncate table data before insert your table data fixture)
 * 2. You: Do something on controller ex create, delete, search, edit,... (one at time)
 * 3. You: Assert something you want to check
 * 4. System: auto truncate table data fixture after each your test
 *
 * @author hungtd
 */
abstract class Vms_Test_PHPUnit_ControllerWithDatabaseFixturesTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
    /**
     *
     * @var Zend_Test_PHPUnit_Db_SimpleTester
     */
    protected $databaseTester;

    /**
     *
     * @var boolean
     */
    protected $truncateFixturesWhenTearDown = true;

    protected function setUp()
    {
        $this->setUpBoostrap();
        parent::setUp();
        $this->setupDatabase();

    }

    /**
     * Init boostrap to controller test case
     *
     * Override this method if you want change init application evn
     */
    protected function setUpBoostrap()
    {
        // Set configuration files
        $config = array(APPLICATION_PATH . '/configs/application.ini');
        if (file_exists(APPLICATION_PATH . '/configs/application.local.ini')) {
            $config[] = APPLICATION_PATH . '/configs/application.local.ini';
        }
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, array('config'=>$config));
    }

    protected function tearDown()
    {
        if ($this->databaseTester) {
            $this->databaseTester->onTearDown(); //default null operation - nothing to
            /**
             * Destroy the tester after the test is run to keep DB connections
             * from piling up.
             */
            $this->databaseTester = NULL;
        }
        parent::tearDown();
    }

    protected function setupDatabase()
    {
        $db = $this->bootstrap->getBootstrap()->getResource('db');
        $connection = new Zend_Test_PHPUnit_Db_Connection($db,'');
        $databaseTester = new Zend_Test_PHPUnit_Db_SimpleTester($connection);
        $databaseTester->setupDatabase($this->getDataSet());
        if ($this->truncateFixturesWhenTearDown) {
            $databaseTester->setTearDownOperation(new Zend_Test_PHPUnit_Db_Operation_Truncate()); // truncate database when call teardown
        }
        $this->databaseTester = $databaseTester;
    }

    /**
     * Table data fixtures setup
     *
     * Example
     *
     * return new PHPUnit_Extensions_Database_DataSet_ArrayDataSet(array(
     *       "table_name" => array(
     *           array("column1_name" => column1_value,"column2_name" => column2_value...)
     *           ...
     *           array("column1_name" => column1_value,"column2_name" => column2_value...)
     *       )
     * ));
     */
    abstract protected function getDataSet();
}
