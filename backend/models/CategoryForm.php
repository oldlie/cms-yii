<?php
namespace backend\models;

use Yii;
use Yii\base\Model;
use common\models\Navigation;

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
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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

    public function update($id)
    {
        if (($model = Navigation::findOne($id)) !== null)
        {
            $model->title = $this->title;
            $model->comment = $this->comment;
            $model->parent = $this->parent;
            $this->image->saveAs($model->image);
            return $model->save();
        }
        return false;
    }

    public function save()
    {
        Yii::error('save');
        if ($this->validate())
        {
            Yii::error('save valid');

            $path = Yii::getAlias("@webroot") . '/uploads/' . date('Y') . '/' . date('m');
            Yii::error('path=>' . $path);
            if(!is_dir($path)) {
                mkdir($path, '0777', true);
            }

            $this->imagePath = 'uploads/' . date('Y') . '/' . date('m') . '/' 
                . substr($this->image->baseName, 0, 10) . '_' . time() . '.' . $this->image->extension;

            $model = new Navigation();
            $model->title = $this->title;
            $model->parent = $this->parent;
            $model->comment = $this->comment;
            $this->image->saveAs($this->imagePath);
            $model->image = $this->imagePath;
            $model->created_at = time();
            $model->updated_at = time();
            return $model->save();
        }
        Yii::error($this->getErrors());
        return false;
    }
}