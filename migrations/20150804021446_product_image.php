<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table product image which store the product's image
 */
class ProductImage extends AbstractMigration {

    public function change() {
        $table = $this->table('ProductImage', ['id' => false]);
        $table->addColumn('ProdId', 'integer', ['limit' => 7])
                ->addForeignKey('ProdId', 'Product', 'ProdId');
        $table->addColumn('ProdImaValue', 'string', ['limit' => 150]);

        $table->create();
    }

}
