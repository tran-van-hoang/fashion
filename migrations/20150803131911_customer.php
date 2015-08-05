<?php

use Phinx\Migration\AbstractMigration;
/**
 * create table customer
 */
class Customer extends AbstractMigration {

    public function change() {
        $table = $this->table('Customer', [
            'id' => false,
            'primary_key' => [
                'CustId'
            ]
        ]);

        $table->addColumn('CustId', 'integer');
        $table->addColumn('CustName', 'string', ['limit' => 70]);
        $table->addColumn('CustGender', 'integer');
        $table->addColumn('CustBirthday', 'date');
        $table->addColumn('CustAddress', 'string',['limit' => 200]);
        $table->addColumn('CustPhone', 'string', ['limit' => 11]);
        $table->addColumn('CustFacebook', 'string', ['limit' => 100]);
        $table->addColumn('CustEmail', 'integer', ['limit' => 100]);
        $table->addColumn('CustPassword', 'integer', ['limit' => 100]);

        $table->create();
        
        $this->execute('ALTER TABLE `Customer` CHANGE CustId CustId INT(7) AUTO_INCREMENT;');
        $this->execute('ALTER TABLE `Customer` CHANGE CustGender CustGender TINYINT(1);');
        
    }

}
