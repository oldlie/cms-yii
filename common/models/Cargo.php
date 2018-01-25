<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_des
 * @property integer $price
 * @property integer $inventory
 * @property string $warning_info
 * @property string $description
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'inventory'], 'integer'],
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
            'name' => 'Name',
            'short_des' => 'Short Des',
            'price' => 'Price',
            'inventory' => 'Inventory',
            'warning_info' => 'Warning Info',
            'description' => 'Description',
        ];
    }
}
