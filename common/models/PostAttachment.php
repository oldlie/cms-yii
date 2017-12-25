<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_attachment".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $path
 */
class PostAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'required'],
            [['post_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'path' => 'Path',
        ];
    }
}
