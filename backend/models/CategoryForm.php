<?php
namespace backend\models;

use Yii;
use Yii\base\Model;
use common\models\Navigation;
use common\models\WebsiteSystem;
use backend\models\SystemSettingForm;

class CategoryForm extends Model
{
    public $id;
    public $title;
    public $parent;
    public $comment;
    public $image;
    public $imagePath;

    public function rules() 
    {
        return [
            ['title', 'required', 'message' => '请指定栏目名称。'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['id', 'comment', 'imagePath'], 'default', 'message' => 'default error'],
            ['parent', 'default', 'value' => 0, 'message' => 'parent error']
        ];
    }

    public function find($id) 
    {
        if (($model = Navigation::findOne($id)) !== null)
        {
            $this->id = $model->id;
            $this->title = $model->title;
            $this->parent = $model->parent;
            $this->comment = $model->comment;
            $this->imagePath = $model->image;
            return true;
        }
        return false;
    }

    public function update()
    {
        if (($model = Navigation::findOne($this->id)) !== null)
        {
            $setting = SystemSettingForm::getSetting();

            if ($this->image) {
                $path = date('Y') . '/' . date('m');
                $dir  = $setting['upload_path'] . '/' . date('Y') . '/' . date('m');
                if(!is_dir($dir)) {
                    mkdir($dir, '0777', true);
                }
                $this->imagePath = date('Y') . '/' . date('m') . '/' 
                    . substr($this->image->baseName, 0, 10) . '_' . time() . '.' . $this->image->extension;
                $this->image->saveAs($setting['upload_path'] . '/' . $this->imagePath);
            } else {
                $this->imagePath = '';
            }

            $model->title = $this->title;
            $model->parent = $this->parent;
            $model->comment = $this->comment;
            $model->image = $this->imagePath;
            $model->updated_at = time();
            
            return $model->save();
        }
        return false;
    }

    public function save()
    {
        if ($this->validate())
        {
            //$setting = WebsiteSystem::findOne(1);
            $setting = SystemSettingForm::getSetting();

            if ($this->image) {
                $path = date('Y') . '/' . date('m');
                $dir  = $setting['upload_path'] . '/' . date('Y') . '/' . date('m');
                if(!is_dir($dir)) {
                    mkdir($dir, '0777', true);
                }
                $this->imagePath = date('Y') . '/' . date('m') . '/' 
                    . substr($this->image->baseName, 0, 10) . '_' . time() . '.' . $this->image->extension;
                $this->image->saveAs($setting['upload_path'] . '/' . $this->imagePath);
            } else {
                $this->imagePath = '';
            }
        
            $model = new Navigation();
            $model->title = $this->title;
            $model->parent = $this->parent;
            $model->comment = $this->comment;
            $model->image = $this->imagePath;
            $model->child_count = 0;
            $model->created_at = time();
            $model->updated_at = time();

            if ($model->parent !== 0 && $model->parent !== '0') {
                $parent = Navigation::findOne($this->parent);
                $parent->child_count++;
                if ($parent->save()) {
                    return $model->save();
                }
            } else {
                return $model->save();
            }
            
        }
        Yii::error($this->getErrors());
        return false;
    }
}