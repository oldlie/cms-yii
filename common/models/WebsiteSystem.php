<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "website_system".
 *
 * @property integer $id
 * @property string $website_name
 * @property string $website_summary
 * @property string $website_keys
 * @property string $icp
 * @property string $upload_url
 * @property string $upload_path
 * @property string $satic_path
 * @property integer $created_at
 * @property integer $updated_at
 */
class WebsiteSystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'website_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['website_name', 'website_summary', 'website_keys', 'icp', 'upload_url', 'upload_path', 'satic_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'website_name' => '网站名称',
            'website_summary' => '网站简介',
            'website_keys' => '网站关键词',
            'icp' => '网站 ICP 备案号',
            'upload_url' => '上传目录外部访问 URL 地址',
            'upload_path' => '上传文件存放绝对路径',
            'satic_path' => 'static 目录资源 URL 地址',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
