<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table permission
 */
class Permission extends AbstractMigration {

    public function change() {
        $table = $this->table('Permission', [
            'id' => false,
            'primary_key' => [
                'PermId'
            ]
        ]);

        $table->addColumn('PermId', 'integer');
        $table->addColumn('PermName', 'string', ['limit' => 200]);
        $table->create();

        $this->execute('ALTER TABLE `Permission` CHANGE PermId PermId INT(2) AUTO_INCREMENT;');
    }

}
