<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table attribute value
 */
class AttributeValue extends AbstractMigration {

    public function change() {
        $table = $this->table('AttributeValue', ['id' => false]);

        $table->addColumn('AttId', 'integer', ['limit' => 7])
                ->addForeignKey('AttId', 'Attribute', 'AttId');
        $table->addColumn('ProdId', 'integer', ['limit' => 7])
                ->addForeignKey('ProdId', 'Product', 'ProdId');
        $table->addColumn('AttValValue', 'string', ['limit' => 200]);

        $table->create();
    }

}
