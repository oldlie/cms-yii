<?php

use yii\db\Migration;

class m180326_115851_create_home_slide extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%home_slide}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('标题'),
            'path' => $this->integer()->comment('URL')
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180326_115851_create_home_slide cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180326_115851_create_home_slide cannot be reverted.\n";

        return false;
    }
    */
}
