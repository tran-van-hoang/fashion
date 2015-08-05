<?php

use Phinx\Migration\AbstractMigration;

/**
 * create table news category
 */
class NewsCategory extends AbstractMigration {

    public function change() {
        $table = $this->table('NewsCategory', [
            'id' => false,
            'primary_key' => [
                'NewsCatId'
            ]
        ]);

        $table->addColumn('NewsCatId', 'integer');
        $table->addColumn('AdmId', 'integer', ['limit' => 7]);
        $table->create();
        
        $this->execute('ALTER TABLE `NewsCategory` CHANGE NewsCatId NewsCatId INT(7) AUTO_INCREMENT;');
    }

}
