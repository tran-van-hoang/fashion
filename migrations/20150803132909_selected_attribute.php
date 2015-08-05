<?php

use Phinx\Migration\AbstractMigration;

class SelectedAttribute extends AbstractMigration {

    public function change() {
        $table = $this->table('SelectedAttribute', ['id' => false]);
        $table->addColumn('OrdDetId', 'integer', ['limit' => 7])
                ->addForeignKey('OrdDetId', 'OrderDetail', 'OrdDetId');
        $table->addColumn('SelAttId', 'integer', ['limit' => 7])
                ->addForeignKey('SelAttId', 'SelectAttribute', 'SelAttId');
        $table->addColumn('SelectedAttValue', 'string', ['limit' => 100]);

        $table->create();
    }

}
