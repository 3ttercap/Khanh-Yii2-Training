<?php

use yii\db\Migration;

/**
 * Handles the creation of table `note`.
 * Has foreign keys to the tables:
 *
 * - `user_create`
 * - `user_modified`
 */
class m170104_113928_create_note_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('note', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text(),
            'status' => $this->integer(),
            'due_date' => $this->string(),
            'creation_date' => $this->string(),
            'modified_date' => $this->string(),
            'user_create' => $this->integer()->notNull(),
            'user_modified' => $this->integer(),
        ]);

        // creates index for column `user_create`
        $this->createIndex(
            'idx-note-user_create',
            'note',
            'user_create'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-note-user_create',
            'note',
            'user_create',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_modified`
        $this->createIndex(
            'idx-note-user_modified',
            'note',
            'user_modified'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-note-user_modified',
            'note',
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
            'fk-note-user_create',
            'note'
        );

        // drops index for column `user_create`
        $this->dropIndex(
            'idx-note-user_create',
            'note'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-note-user_modified',
            'note'
        );

        // drops index for column `user_modified`
        $this->dropIndex(
            'idx-note-user_modified',
            'note'
        );

        $this->dropTable('note');
    }
}
