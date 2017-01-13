<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 * Has foreign keys to the tables:
 *
 * - `user_create`
 * - `user_modified`
 */
class m170104_114426_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'type' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
            'creation_date' => $this->string(),
            'modified_date' => $this->string(),
            'user_create' => $this->integer()->notNull(),
            'user_modified' => $this->integer(),
        ]);

        // creates index for column `user_create`
        $this->createIndex(
            'idx-category-user_create',
            'category',
            'user_create'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-category-user_create',
            'category',
            'user_create',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_modified`
        $this->createIndex(
            'idx-category-user_modified',
            'category',
            'user_modified'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-category-user_modified',
            'category',
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
            'fk-category-user_create',
            'category'
        );

        // drops index for column `user_create`
        $this->dropIndex(
            'idx-category-user_create',
            'category'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-category-user_modified',
            'category'
        );

        // drops index for column `user_modified`
        $this->dropIndex(
            'idx-category-user_modified',
            'category'
        );

        $this->dropTable('category');
    }
}
