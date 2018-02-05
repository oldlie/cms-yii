<?php

use yii\db\Migration;

class m180125_120653_create_food_spec extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%food_spec}}', [
            'id' => $this->primaryKey(),
            'cargo_id' => $this->integer()->comment('商品ID'),
            'name' => $this->string()->comment('规格名称'),
            'breed' => $this->string()->comment('品种'),
            'origin' => $this->string()->comment('产地'),
            'feature' => $this->string()->comment('特征'),
            'spec' => $this->string()->comment('规格'),
            'store' => $this->string()->comment('存储方式'),
            'product_datetime' => $this->string()->comment('生产日期'),
            'quota_policy' => $this->string()->comment('限购策略'),
            'price' => $this->integer()->comment('价格'),
            'inventory' => $this->integer()->comment('库存')
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m180125_120653_create_food_spec cannot be reverted.\n";
        $this->dropTable('{{%food_spec}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180125_120653_create_food_spec cannot be reverted.\n";

        return false;
    }
    */
}
