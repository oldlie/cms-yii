<?php

namespace common\models;

use Yii;
use common\models\Navigation;

/**
 * This is the model class for table "post_category".
 *
 * @property integer $id
 * @property integer $navigation_id
 * @property integer $post_id
 * @property string $post_title
 * @property integer $prev_id
 * @property string $prev_title
 * @property integer $next_id
 * @property string $next_title
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['navigation_id', 'post_id', 'created_at', 'updated_at'], 'required'],
            [['navigation_id', 'post_id', 'prev_id', 'next_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['prev_title', 'next_title', 'post_title'], 'string', 'max' => 255],
        ];
    }

    public function getMenu() {
        return $this->hasOne(Navigation::className(), ['id' => 'navigation_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'navigation_id' => 'Navigation ID',
            'post_id' => 'Post ID',
            'prev_id' => 'Prev ID',
            'next_id' => 'Next ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'prev_title' => 'Prev Title',
            'next_title' => 'Next Title',
        ];
    }
}
