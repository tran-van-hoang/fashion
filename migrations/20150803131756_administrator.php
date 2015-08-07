<?php

use Phinx\Migration\AbstractMigration;
/**
 * create table administrator
 */
class Administrator extends AbstractMigration {

//    public function change() {
//        
//    }

    public function up() {
        $table = $this->table('Administrator', [
            'id' => false,
            'primary_key' => [
                'AdmId'
            ]
        ]);

        $table->addColumn('AdmId', 'integer', ['limit' => 7]);
        $table->addColumn('AdmName', 'string', ['limit' => 70]);
        $table->addColumn('AdmFacebook', 'string', ['limit' => 100]);
        $table->addColumn('AdmPhone', 'string', ['limit' => 11]);
        $table->addColumn('AdmEmail', 'string', ['limit' => 100]);
        $table->addColumn('AdmPassword', 'integer', ['limit' => 100]);
        $table->addColumn('AdmStatus', 'integer');
        $table->addIndex(['AdmEmail'], ['unique' => true]);
        $table->create();

        $this->execute('ALTER TABLE `Administrator` CHANGE AdmId AdmId INT(7) AUTO_INCREMENT;');
        $this->execute('ALTER TABLE `Administrator` CHANGE AdmStatus AdmStatus TINYINT(1);');
    }

}
