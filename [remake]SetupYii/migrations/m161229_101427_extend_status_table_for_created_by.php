<?php

use yii\db\Schema;
use yii\db\Migration;

class m161229_101427_extend_status_table_for_created_by extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
//        $this->addColumn('{{%status}}', 'created_by', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addColumn('{{%status}}', 'created_by', $this->integer());
        $this->addForeignKey('fk_status_created_by', '{{%status}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_status_created_by', '{{%status}}');
        $this->dropColumn('{{%status}}', 'created_by');

//        echo "m161229_101427_extend_status_table_for_created_by cannot be reverted.\n";
//
//        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
