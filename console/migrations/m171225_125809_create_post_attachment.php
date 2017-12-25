<?php

use yii\db\Migration;

class m171225_125809_create_post_attachment extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%post_attachment}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull()->comment('文章ID'),
            'path' => $this->string()->comment('附件的相对路径')
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171225_125809_create_post_attachment cannot be reverted.\n";
        $this->dropTable('{{%post_attachment}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171225_125809_create_post_attachment cannot be reverted.\n";

        return false;
    }
    */
}
