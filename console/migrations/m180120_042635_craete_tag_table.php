<?php

use yii\db\Migration;

class m180120_042635_craete_tag_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            't_text' => $this->string()->comment('标签文本'),
            't_icon' => $this->string()->comment('图标class'),
            't_icon_file' => $this->string()->comment('图标文件路径'),
            'parent_id' => $this->integer()->comment('父标签ID'),
            'parent_text' => $this->string()->comment('父标签'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180120_042635_craete_tag_table cannot be reverted.\n";
        $this->dropTable('{{%tag}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180120_042635_craete_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
