<?php

namespace backend\models;

use Yii;
use Yii\base\Model;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $id
 * @property integer $cargo_id
 * @property string $name
 * @property string $origin 原产地
 * @property string $feature 特征
 * @property string $store 存储方式
 * @property string $product_datetime 生产日期
 * @property string $quota_policy 限购政策
 * @property integer $price 价格
 * @property integer $inventory 库存
 */

class FoodspecForm extends Model
{
    public $cargo_id;
    public $name;
    public $origin;
    public $feature;
    public $store;
    public $product_datetime;
    public $quota_policy;
    public $price;
    public $inventory;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_id', 'price', 'inventory'], 'integer'],
            [['name', 'origin', 'feature', 'store', 'product_datetime', 'quota_policy'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cargo_id' => '商品ID',
            'short_des' => '简要描述',
            'price' => '价格',
            'inventory' => '库存',
            'warning_info' => '提示信息',
            'description' => '详细描述',
        ];
    }
}