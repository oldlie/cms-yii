<?php

use yii\db\Migration;

class m171106_144201_create_cargos extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%cargos}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'comment' => $this->string(),
            'image' => $this->string(),
            'province' => $this->smallInteger(),
            'category' => $this->smallInteger(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m171106_144201_create_cargos cannot be reverted.\n";
        $this->dropTable('{{%cargos}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171106_144201_create_cargos cannot be reverted.\n";

        return false;
    }
    */
}
