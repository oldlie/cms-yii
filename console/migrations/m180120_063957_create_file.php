<?php

use yii\db\Migration;

class m180120_063957_create_file extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'path' => $this->string()->comment('文件路径'),
            'name' => $this->string()->comment('文件名'),
            'ext' => $this->string()->comment('文件后缀'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180120_063957_create_file cannot be reverted.\n";
        $this->dropTable('{{%file}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180120_063957_create_file cannot be reverted.\n";

        return false;
    }
    */
}
