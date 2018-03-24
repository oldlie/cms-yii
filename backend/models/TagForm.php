<?php
namespace backend\models;

use Yii;
use common\models\TagModel;
use yii\base\Model;

/**
 * This is the model class for table "tag create / edit".
 * 
 * @property integer $id
 * @property string $text
 * @property string $icon
 * @property string $file_path
 * @property integer $parent_id
 * @property string $parent_text
 */
class TagForm extends Model
{
    public $id;
    public $text;
    public $icon;
    public $file_path;
    public $parent_id = 0;
    public $parent_text = '根标签';
    private $model;

    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['text'], 'required', 'message' => '名称不可以省略。'],
            [['icon', 'file_path', 'parent_text'], 'string', 'max' => 255]
        ];
    }

    public function find($id)
    {
        if (($model = TagModel::findOne($id)) !== null) {
            $this->id = $model->id;
            $this->text = $model->t_text;
            $this->icon = $model->t_icon;
            $this->file_path = $model->t_icon_file;
            $this->parent_id = $model->parent_id;
            $this->parent_text = $model->parent_text;
            $this->model = $model;
            return true;
        }
        return false;
    }

    public function count($parentId)
    {
        return TagModel::find()->where(['parent_id' => $parentId])->count();
    }

    public function delete($id)
    {
        if ($this->find($id)) {
            if ($this->count($this->id) > 0) {
                $this->addError('hasChild', '删除标签之前请先删除或者移动本页面的子标签。');
                return false;
            }
            $setting = SystemSettingForm::getSetting();
            if ($this->file_path) {
                $file = $setting['upload_path'] . '/' . $this->file_path;
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            return $this->model->delete();
        }
        return false;
    }

    public function save()
    {
        if ($this->validate()) {
            $model = new TagModel();
            $model->t_text = $this->text;
            $model->t_icon = $this->icon;
            if (empty($this->file_path)) {
                $model->t_icon_file = 'image/image_default.jpg';
            } else {
                $model->t_icon_file = $this->file_path;
            }
            $model->parent_id = $this->parent_id;
            $model->parent_text = $this->parent_text;
            return $model->save();
        }
        return false;
    }

    public function update($id)
    {
        if ($this->validate()) {
            if (($model = TagModel::findOne($id)) !== null) {
                $model->t_text = $this->text;
                if ($this->file_path && $this->file_path != '') {
                    $model->t_icon_file = $this->file_path;
                }
                $model->parent_id = $this->parent_id;
                $model->parent_text = $this->parent_text;
                return $model->save();
            }
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => '名称',
            'icon' => '图标代码(eg. fa fa-edit)',
            'file_path' => '图像文件',
            'parent_id' => '上级标签ID',
            'parent_text' => '上级标签'
        ];
    }
}