<?php

use yii\db\Migration;

class m171107_122844_create_navigation extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('{{%navigation}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'parent' => $this->integer(),
            'comment' => $this->string(),
            'image' => $this->string(),
            'child_count' => $this->integer()->comment('子节点计数'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171107_122844_create_navigation cannot be reverted.\n";
        $this->truncateTable('{{%navigation}}');
        $this->dropTable('{{%navigation}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171107_122844_create_navigation cannot be reverted.\n";

        return false;
    }
    */
}
