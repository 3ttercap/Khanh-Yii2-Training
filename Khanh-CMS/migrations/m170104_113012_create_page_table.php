<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 * Has foreign keys to the tables:
 *
 * - `user_create`
 * - `user_modified`
 */
class m170104_113012_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'image' => $this->string(),
            'alias' => $this->string()->notNull(),
            'creation_date' => $this->string(),
            'modified_date' => $this->string(),
            'user_create' => $this->integer()->notNull(),
            'user_modified' => $this->integer(),
        ]);

        // creates index for column `user_create`
        $this->createIndex(
            'idx-page-user_create',
            'page',
            'user_create'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-page-user_create',
            'page',
            'user_create',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_modified`
        $this->createIndex(
            'idx-page-user_modified',
            'page',
            'user_modified'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-page-user_modified',
            'page',
            'user_modified',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-page-user_create',
            'page'
        );

        // drops index for column `user_create`
        $this->dropIndex(
            'idx-page-user_create',
            'page'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-page-user_modified',
            'page'
        );

        // drops index for column `user_modified`
        $this->dropIndex(
            'idx-page-user_modified',
            'page'
        );

        $this->dropTable('page');
    }
}
