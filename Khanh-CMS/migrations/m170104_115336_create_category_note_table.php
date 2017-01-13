<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_note`.
 * Has foreign keys to the tables:
 *
 * - `category`
 * - `note`
 */
class m170104_115336_create_category_note_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category_note', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'note_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-category_note-category_id',
            'category_note',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-category_note-category_id',
            'category_note',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `note_id`
        $this->createIndex(
            'idx-category_note-note_id',
            'category_note',
            'note_id'
        );

        // add foreign key for table `note`
        $this->addForeignKey(
            'fk-category_note-note_id',
            'category_note',
            'note_id',
            'note',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-category_note-category_id',
            'category_note'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-category_note-category_id',
            'category_note'
        );

        // drops foreign key for table `note`
        $this->dropForeignKey(
            'fk-category_note-note_id',
            'category_note'
        );

        // drops index for column `note_id`
        $this->dropIndex(
            'idx-category_note-note_id',
            'category_note'
        );

        $this->dropTable('category_note');
    }
}
