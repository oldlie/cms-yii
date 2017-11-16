<?php

use yii\db\Migration;

class m171116_133942_create_website_system extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%website_system}}', [
            'id' => $this->primaryKey(),
            'website_name' => $this->string(),
            'website_summary' => $this->string(),
            'website_keys' => $this->string(),
            'icp' => $this->string()->comment('ICP备案号'),
            'upload_url' => $this->string()->comment('上传文件网络访问路径'),
            'upload_path' => $this->string()->comment('上传文件保存磁盘路径'),
            'satic_path' => $this->string()->comment('静态文件路径'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171116_133942_create_website_system cannot be reverted.\n";
        $this->dropTable('{{%website_system}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171116_133942_create_website_system cannot be reverted.\n";

        return false;
    }
    */
}
