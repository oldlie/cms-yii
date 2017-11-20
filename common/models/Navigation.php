<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "navigation".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent
 * @property string $comment
 * @property string $image
 * @property integer $child_count
 * @property integer $created_at
 * @property integer $updated_at
 */
class Navigation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'navigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['parent', 'child_count', 'created_at', 'updated_at'], 'integer'],
            [['title', 'comment', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent' => 'Parent',
            'comment' => 'Comment',
            'image' => 'Image',
            'child_count' => 'Child Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
