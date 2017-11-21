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

    public static function getSetting() {
        return Yii::$app->cache->getOrSet('setting', function (){
            return WebsiteSystem::findOne(1);
        });
    }

    public function find()
    {
        if (($model = WebsiteSystem::findOne(1)) !== null)
        {
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

    public function update() {
        if (($model = WebsiteSystem::findOne(1)) !== null)
        {
            $model->website_name = $this->website_name;
            $model->website_summary = $this->website_summary;
            $model->website_keys = $this->website_keys;
            $model->icp = $this->icp;
            $model->upload_url = $this->upload_url;
            $model->upload_path = $this->upload_path;
            $model->satic_path = $this->satic_path;
            $model->save();
            return true;
        }
        return false;
    }
}