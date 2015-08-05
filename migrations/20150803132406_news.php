<?php

use Phinx\Migration\AbstractMigration;

/**
 * create news table
 */
class News extends AbstractMigration {

    public function change() {
        $table = $this->table('News', [
            'id' => false,
            'primary_key' => [
                'NewsId'
            ]
        ]);

        $table->addColumn('NewsId', 'integer');
        $table->addColumn('NewsTitle', 'string', ['limit' => 150]);
        $table->addColumn('NewsSummary', 'string', ['limit' => 300]);
        $table->addColumn('NewsContent', 'text');
        $table->addColumn('NewsDate', 'datetime');
        $table->addColumn('NewsCatId', 'integer', ['limit' => 7])
                ->addForeignKey('NewsCatId', 'NewsCategory', 'NewsCatId');

        $table->addColumn('AdmId', 'integer', ['limit' => 7])
                ->addForeignKey('AdmId', 'Administrator', 'AdmId');
        $table->addColumn('NewsStatus', 'integer');

        $table->create();

        $this->execute('ALTER TABLE `News` CHANGE NewsId NewsId INT(7) AUTO_INCREMENT;');
        $this->execute('ALTER TABLE `News` CHANGE NewsStatus NewsStatus TINYINT(1);');
        
    }

}
