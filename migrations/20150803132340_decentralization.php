<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table Decentralization
 */
class Decentralization extends AbstractMigration {

    public function change() {
        $table = $this->table('Decentralization', [
            'id' => false
        ]);

        $table->addColumn('PermId', 'integer', ['limit' => 2])
                ->addForeignKey('PermId', 'Permission', 'PermId');;
        $table->addColumn('AdmId', 'integer', ['limit' => 7])
                ->addForeignKey('AdmId', 'Administrator', 'AdmId');;
        $table->create();
    }

}
