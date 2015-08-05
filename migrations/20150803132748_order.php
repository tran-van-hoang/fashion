<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table order
 */
class Order extends AbstractMigration {

    public function change() {
        $table = $this->table('Order', [
            'id' => false,
            'primary_key' => [
                'OrdId'
            ]
        ]);

        $table->addColumn('OrdId', 'integer');
        $table->addColumn('CustId', 'integer', ['limit' => 7])
                ->addForeignKey('CustId', 'Customer', 'CustId');
        $table->addColumn('OrderStatus', 'integer');
        $table->addColumn('OrderDate', 'datetime');
        $table->addColumn('OrderProcessDate', 'datetime');
        $table->addColumn('OrderDescription', 'text');


        $table->create();

        $this->execute('ALTER TABLE `Order` CHANGE OrdId OrdId INT(7) AUTO_INCREMENT;');
        $this->execute('ALTER TABLE `Order` CHANGE OrderStatus OrderStatus TINYINT(1);');
    }

}
