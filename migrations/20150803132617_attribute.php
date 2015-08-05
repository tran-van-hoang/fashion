<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table attribute
 */
class Attribute extends AbstractMigration {

    public function change() {
        $table = $this->table('Attribute', [
            'id' => false,
            'primary_key' => [
                'AttId'
            ]
        ]);

        $table->addColumn('AttId', 'integer');
        $table->addColumn('AttGroId', 'integer', ['limit' => 7])
                ->addForeignKey('AttGroId', 'AttributeGroup', 'AttGroId');
        $table->addColumn('AttName', 'string', ['limit' => 100]);

        $table->create();

        $this->execute('ALTER TABLE `Attribute` CHANGE AttId AttId INT(7) AUTO_INCREMENT;');
    }

}
