<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $path
 * @property string $name
 * @property string $ext
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'name', 'ext'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'name' => 'Name',
            'ext' => 'Ext',
        ];
    }
}
