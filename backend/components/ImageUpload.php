<?php
namespace backend\components;

use yii\base\Widget;
use backend\models\SystemSettingForm;

class ImageUpload extends Widget
{
    public $id;
    public $url;
    public $path;
    public $name;

    public function run() 
    {
        if (!$this->id) {
            $this->id = 'file';
        }
        if (!$this->path) {
            $this->path = 'image/image_default.jpg';
        }
        if (!$this->url) {
            $setting = SystemSettingForm::getSetting();
            $this->url = $setting['upload_url'];
        }
        if (!$this->name) {
            $this->name = "FileForm['file']";
        }
        return $this->render('image_upload', [
            'id' => $this->id,
            'url' => $this->url,
            'path' => $this->path,
            'name' => $this->name
        ]);
    }
}