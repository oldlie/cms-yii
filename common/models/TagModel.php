<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $t_text
 * @property string $t_icon
 * @property string $t_icon_file
 * @property integer $parent_id
 * @property string $parent_text
 */
class TagModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['t_text', 't_icon', 't_icon_file', 'parent_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't_text' => 'T Text',
            't_icon' => 'T Icon',
            't_icon_file' => 'T Icon File',
            'parent_id' => 'Parent ID',
            'parent_text' => 'Parent Text'
        ];
    }
}
