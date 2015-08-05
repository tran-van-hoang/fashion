<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table banner
 */
class Banner extends AbstractMigration {

    public function change() {
        $table = $this->table('Banner', ['id' => false]);
        $table->addColumn('BannImage', 'text');

        $table->create();
    }

}
