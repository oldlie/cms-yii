<?php

use yii\db\Migration;

class m180206_060014_create_carousel extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%carousel}}', [
            'id' => $this->primaryKey(),
            'seq' => $this->string()->comment('序号'),
            'title' => $this->integer()->comment('轮播图标题'),
            'image_url' => $this->string()->comment('图片URL'),
            'url' => $this->string()->comment('跳转URL'),
            't' => $this->integer()->comment('可能会用的字段，用于标示哪里的轮播图'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180206_060014_create_carousel cannot be reverted.\n";
        $this->dropTable('{{%carousel}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_060014_create_carousel cannot be reverted.\n";

        return false;
    }
    */
}
