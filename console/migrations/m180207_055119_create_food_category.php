<?php

use yii\db\Migration;

class m180207_055119_create_food_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%food_category}}', [
            'id' => $this->primaryKey(),
            'seq' => $this->string()->comment('序号'),
            'tag_id' => $this->integer()->comment('标签ID'),
            'tag_title' => $this->string()->comment('标签名称'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180207_055119_create_food_category cannot be reverted.\n";
        $this->dropTable('{{%food_category}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_055119_create_food_category cannot be reverted.\n";

        return false;
    }
    */
}
