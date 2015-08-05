<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table order detail which contain the detail of each order
 */
class OrderDetail extends AbstractMigration {

    public function change() {
        $table = $this->table('OrderDetail', [
            'id' => false,
            'primary_key' => [
                'OrdDetId'
            ]
        ]);
        $table->addColumn('OrdDetId', 'integer', ['limit' => 7]);
        $table->addColumn('OrdId', 'integer', ['limit' => 7])
                ->addForeignKey('OrdId', 'Order', 'OrdId');
        $table->addColumn('OrdDetQuantity', 'integer', ['limit' => 7]);
        $table->addColumn('OrdDetPrice', 'integer', ['limit' => 12]);
        $table->addColumn('ProdId', 'integer', ['limit' => 7])
                ->addForeignKey('ProdId', 'Product', 'ProdId');

        $table->create();
        $this->execute('ALTER TABLE `OrderDetail` CHANGE OrdDetId OrdDetId INT(7) AUTO_INCREMENT;');
    }

}
