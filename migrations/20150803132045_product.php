<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table product
 */
class Product extends AbstractMigration {

    public function change() {
        $table = $this->table('Product', [
            'id' => false,
            'primary_key' => [
                'ProdId'
            ]
        ]);

        $table->addColumn('ProdId', 'integer');
        $table->addColumn('ProdName', 'string', ['limit' => 200]);
        $table->addColumn('SuppId', 'integer', ['limit' => 7])
                ->addForeignKey('SuppId', 'Supplier', 'SuppId');
        $table->addColumn('ProdAddDate', 'datetime');
        $table->addColumn('ProdPrice', 'integer', ['limit' => 20]);
        $table->addColumn('ProdPurchasePrice', 'integer', ['limit' => 20]);
        $table->addColumn('ProdQuantity', 'integer', ['limit' => 7]);
        $table->addColumn('ProdStatus', 'integer');
        $table->addColumn('ProdDescription', 'text');
        $table->addColumn('ProdCatId', 'integer', ['limit' => 7])
                ->addForeignKey('ProdCatId', 'ProductCategory', 'ProdCatId');
        $table->addColumn('metaKeyWord', 'string', ['limit' => 100]);
        $table->addColumn('metaDescription', 'string', ['limit' => 150]);

        $table->create();

        $this->execute('ALTER TABLE `Product` CHANGE ProdId ProdId INT(7) AUTO_INCREMENT;');
        $this->execute('ALTER TABLE `Product` CHANGE ProdStatus ProdStatus TINYINT(1);');
    }

}
