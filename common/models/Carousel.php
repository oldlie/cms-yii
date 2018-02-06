<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carousel".
 *
 * @property integer $id
 * @property string $seq
 * @property integer $title
 * @property string $image_url
 * @property string $url
 * @property integer $t
 */
class Carousel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carousel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 't'], 'integer'],
            [['seq', 'image_url', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seq' => '序号',
            'title' => '轮播图标题',
            'image_url' => '图片URL',
            'url' => '跳转URL',
            't' => '可能会用的字段，用于标示哪里的轮播图',
        ];
    }
}
