<?php

namespace backend\models;

use Yii;
use Yii\base\Model;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_des
 * @property string $warning_info
 * @property string $description
 */
class CargoForm extends Model
{
    public $name;
    public $short_des;
    public $warning_info;
    public $description;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name', 'short_des', 'warning_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '商品名称',
            'short_des' => '简要描述',
            'price' => '价格',
            'inventory' => '库存',
            'warning_info' => '提示信息',
            'description' => '详细描述',
        ];
    }
}
