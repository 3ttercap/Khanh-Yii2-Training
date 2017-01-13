<?php

use yii\db\Migration;

/**
 * Handles the creation of table `note`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170109_033601_create_note_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('note', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->string(),
            'due_date' => $this->date(),
            'created_at' => $this->date(),
            'modified_at' => $this->date(),
            'user_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-note-user_id',
            'note',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-note-user_id',
            'note',
            'user_id',
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
            'fk-note-user_id',
            'note'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-note-user_id',
            'note'
        );

        $this->dropTable('note');
    }
}
