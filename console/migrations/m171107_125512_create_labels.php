<?php

use yii\db\Migration;

class m171107_125512_create_labels extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('{{%labels}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171107_125512_create_labels cannot be reverted.\n";
        $this->dropTable('{{%labels}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171107_125512_create_labels cannot be reverted.\n";

        return false;
    }
    */
}
