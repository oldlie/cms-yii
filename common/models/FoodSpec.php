<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "food_spec".
 *
 * @property integer $id
 * @property integer $cargo_id
 * @property string $name
 * @property string $category
 * @property string $origin
 * @property string $feature
 * @property string $spec
 * @property string $store
 * @property string $product_datetime
 * @property string $quota_policy
 */
class FoodSpec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food_spec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_id'], 'integer'],
            [['name', 'category', 'origin', 'feature', 'spec', 'store', 'product_datetime', 'quota_policy'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cargo_id' => 'Cargo ID',
            'name' => 'Name',
            'category' => 'Category',
            'origin' => 'Origin',
            'feature' => 'Feature',
            'spec' => 'Spec',
            'store' => 'Store',
            'product_datetime' => 'Product Datetime',
            'quota_policy' => 'Quota Policy',
        ];
    }
}
