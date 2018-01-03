<?php

use yii\db\Migration;

class m171107_150849_create_post_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('{{%post_category}}', [
            'id' => $this->primaryKey(),
            'navigation_id' => $this->integer()->notNull()->comment('导航栏目ID'),
            'post_id' => $this->integer()->notNull()->comment('文章ID'),
            'post_title' => $this->string()->notNull()->comment('上一篇文章标题'),
            'prev_id' => $this->integer()->defaultValue(0)->comment('上一篇文章ID'),
            'prev_title' => $this->string()->comment('上一篇文章标题'),
            'next_id' => $this->integer()->defaultValue(0)->comment('下一篇文章ID'),
            'next_title' => $this->string()->comment('title of next post'),
            'status' => $this->smallInteger()->comment('状态：0：草稿；1：发布'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171107_150849_create_post_category cannot be reverted.\n";
        $this->dropTable('{{%post_category}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171107_150849_create_post_category cannot be reverted.\n";

        return false;
    }
    */
}
