<?php

use yii\db\Migration;

class m180122_125750_create_cargo extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%cargo}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('商品名称'),
            'short_des' => $this->string()->comment('短描述，HTML'),
            'warning_info' => $this->string()->comment('注意事项'),
            'description' => $this->text()->comment('图文描述HTML'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180122_125750_create_cargo cannot be reverted.\n";
        $this->dropTable('{{%cargo}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180122_125750_create_cargo cannot be reverted.\n";

        return false;
    }
    */
}
