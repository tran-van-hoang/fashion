<?php

use Phinx\Migration\AbstractMigration;
/**
 * create table product category
 */
class ProductCategory extends AbstractMigration {

    public function change() {
        $table = $this->table('ProductCategory', [
            'id' => false,
            'primary_key' => [
                'ProdCatId'
            ]
        ]);

        $table->addColumn('ProdCatId', 'integer');
        $table->addColumn('ProdCatName', 'string', ['limit' => 70]);
        $table->addColumn('ProdCatParentId', 'integer', ['limit' => 7]);

        $table->create();

        $this->execute('ALTER TABLE `ProductCategory` CHANGE ProdCatId ProdCatId INT(7) AUTO_INCREMENT;');
    }

}
