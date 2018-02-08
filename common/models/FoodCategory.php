<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FoodCategory".
 *
 * @property integer $id
 * @property integer $seq
 * @property integer $tag_id
 * @property string $tag_title
 * @property integer $cargo_id
 * @property string $cargo_name
 */
class FoodCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seq', 'tag_id', 'cargo_id'], 'integer'],
            [['tag_title', 'cargo_name'], 'string', 'max' => 255],
        ];
    }

}