<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FoodCategory".
 *
 * @property integer $id
 * @property integer $seq
 * @property string $title
 * @property integer $parent_id
 * @property string $parent_title
 * @property integer $children_count
 * @property string $path_id
 * @property string $path_title
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
            [['seq', 'parent_id', 'children_count'], 'integer'],
            [['title', 'parent_title', 'path_id', 'path_title'], 'string', 'max' => 255],
        ];
    }

}