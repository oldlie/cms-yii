<?php

use yii\db\Migration;

class m180206_061143_create_top_cargo extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%top_cargo}}', [
            'id' => $this->primaryKey(),
            'seq' => $this->string()->comment('序号'),
            'cargo_id' => $this->integer()->comment('首页显示的商品ID'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180206_061143_create_top_cargo cannot be reverted.\n";
        $this->dropTable('{{%top_cargo}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_061143_create_top_cargo cannot be reverted.\n";

        return false;
    }
    */
}
