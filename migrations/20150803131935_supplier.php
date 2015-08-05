<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table supplier
 */
class Supplier extends AbstractMigration {

    public function change() {
        $table = $this->table('Supplier', [
            'id' => false,
            'primary_key' => [
                'SuppId'
            ]
        ]);

        $table->addColumn('SuppId', 'integer');
        $table->addColumn('SuppName', 'string', ['limit' => 70]);
        $table->addColumn('SuppAddress', 'string', ['limit' => 200]);
        $table->addColumn('SuppFacebook', 'string', ['limit' => 100]);
        $table->addColumn('SuppPhone', 'string', ['limit' => 11]);
        $table->addColumn('SuppEmail', 'string', ['limit' => 100]);
        $table->addColumn('SuppFax', 'string', ['limit' => 11]);

        $table->create();

        $this->execute('ALTER TABLE `Supplier` CHANGE SuppId SuppId INT(7) AUTO_INCREMENT;');
    }

}
