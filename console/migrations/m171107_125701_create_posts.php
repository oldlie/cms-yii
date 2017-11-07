<?php

use yii\db\Migration;

class m171107_125701_create_posts extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string(),
            'author' => $this->string(32)->notNull(),
            'publisher' => $this->string(32),
            'editor' => $this->string(32),
            'image' => $this->string(),
            'content' => $this->text(),
            'status' => $this->smallInteger()->comment('状态：0：草稿；1：发布'),
            'comment_status' => $this->smallInteger()->comment('是否开启评论：0：不开启；1开启；'),
            'publish_date' => $this->dateTime(),
            'view_count' => $this->integer(),
            'like_count' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171107_125701_create_posts cannot be reverted.\n";
        $this->dropTable('{{%posts}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171107_125701_create_posts cannot be reverted.\n";

        return false;
    }
    */
}
