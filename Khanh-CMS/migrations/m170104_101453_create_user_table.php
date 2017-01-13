<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170104_101453_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'email' => $this->string(255),
            'password' => $this->string(255),
        ], $tableOptions);

//        $this->createTable('user', [
//            'id' => $this->primaryKey(),
//        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
