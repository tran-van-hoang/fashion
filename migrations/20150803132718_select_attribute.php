<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table select attribute which store type data used to select
 */
class SelectAttribute extends AbstractMigration {

    public function change() {
        $table = $this->table('SelectAttribute', [
            'id' => false,
            'primary_key' => [
                'SelAttId'
            ]
        ]);

        $table->addColumn('SelAttId', 'integer');
        $table->addColumn('SelAttName', 'string', ['limit' => 100]);

        $table->create();
        $this->execute('ALTER TABLE `SelectAttribute` CHANGE SelAttId SelAttId INT(7) AUTO_INCREMENT;');
    }

}
