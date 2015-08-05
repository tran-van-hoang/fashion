<?php

use Phinx\Migration\AbstractMigration;
/**
 * create table attribute group
 */
class AttributeGroup extends AbstractMigration {

    public function change() {
        $table = $this->table('AttributeGroup', [
            'id' => false,
            'primary_key' => [
                'AttGroId'
            ]
        ]);

        $table->addColumn('AttGroId', 'integer', ['limit' => 7]);
        $table->addColumn('AttGroName', 'string', ['limit' => 200]);

        $table->create();
        
        $this->execute('ALTER TABLE `AttributeGroup` CHANGE AttGroId AttGroId INT(7) AUTO_INCREMENT;');
    }

}
