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

    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['text'], 'required', 'message' => '名称不可以省略。'],
            [['icon', 'file_path'], 'string', 'max' => 255]
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
            return true;
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