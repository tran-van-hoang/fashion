<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table select attribute value which store data used to select
 */
class SelectAttributeValue extends AbstractMigration {

    public function change() {
        $table = $this->table('SelectAttributeValue', ['id' => false]);

        $table->addColumn('SelAttId', 'integer', ['limit' => 7])
                ->addForeignKey('SelAttId', 'SelectAttribute', 'SelAttId');
        $table->addColumn('ProdId', 'integer', ['limit' => 7])
                ->addForeignKey('ProdId', 'Product', 'ProdId');
        $table->addColumn('SelAttValValue', 'string', ['limit' => 200]);

        $table->create();
    }

}
