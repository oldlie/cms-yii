<?php
namespace backend\models;

use Yii;
use Yii\base\Model;
use common\models\WebsiteSystem;

class SystemSettingForm extends Model
{
    public $website_name;
    public $website_summary;
    public $website_keys;
    public $icp;
    public $upload_url;
    public $upload_path;
    public $satic_path;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['website_name', 'website_summary', 'website_keys', 'icp', 'upload_url', 'upload_path', 'satic_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * 获取后台配置
     * @return array WebsiteSystem
     */
    public static function getSetting()
    {
        // $query = WebsiteSystem::find()->where(['id', 1]);
        // $depndence = new \yii\caching\DbDependency(['sql' => $query->sql]);
        return WebsiteSystem::findOne(1);
        // return Yii::$app->cache->getOrSet(
        //     'setting',
        //     function () {
        //         return WebsiteSystem::findOne(1);
        //     }
        // );
    }

    public static function getImagePath($imageFile) 
    {
        $setting = SystemSettingForm::getSetting();
        if ($imageFile) {
            $path = date('Y') . '/' . date('m');
            $dir = $setting['upload_path'] . '/' . $path;
            if (!is_dir($dir)) {
                mkdir($dir, '0777', true);
            }
            $image = $path . '/'
                . substr($imageFile->baseName, 0, 10) . '_' . time()
                . '.'
                . $imageFile->extension;
            $imageFile->saveAs($setting['upload_path'] . '/' . $this->image);
        } else {
            $image = '';
        }
        return $image;
    }

    public function find()
    {
        if ( ($model = WebsiteSystem::findOne(1)) !== null) {
            $this->website_name = $model->website_name;
            $this->website_summary = $model->website_summary;
            $this->website_keys = $model->website_keys;
            $this->icp = $model->icp;
            $this->upload_url = $model->upload_url;
            $this->upload_path = $model->upload_path;
            $this->satic_path = $model->satic_path;
            return true;
        }
        return false;
    }

    public function update()
    {
        if ( ($model = WebsiteSystem::findOne(1)) !== null) {
            $model->website_name = $this->website_name;
            $model->website_summary = $this->website_summary;
            $model->website_keys = $this->website_keys;
            $model->icp = $this->icp;
            $model->upload_url = $this->upload_url;
            $model->upload_path = $this->upload_path;
            $model->satic_path = $this->satic_path;
            if ($model->save()) {
                // 更新缓存
                // Yii::$app->cache->set('setting', function () {
                //     return WebsiteSystem::findOne(1);
                // });
                return true;
            } else {
                return false;
            }

        }
        return false;
    }
}