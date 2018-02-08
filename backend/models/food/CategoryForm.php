<?php

namespace backend\models\food;

use Yii;
use \yii\base\Model;
use common\models\FoodCategory;

/**
 * Food Category
 * 
 * @property integer $id
 * @property integer $seq
 * @property integer $tag_id
 * @property string $tag_title
 * @property integer $cargo_id
 * @property string $cargo_name
 */
class CategoryForm extends Model
{
    public $id;
    public $seq;
    public $tag_id;
    public $tag_title;
    public $cargo_id;
    public $cargo_name;

    /**
     * 设置值
     * 
     * @param FoodCategory $model
     * @return boolean
     */
    private function setModelValues($model)
    {
        $model->seq = $this->seq;
        $model->tag_id = $this->tag_id;
        $model->tag_title = $this->tag_title;
        $model->cargo_id = $this->cargo_id;
        $model->cargo_name = $this->cargo_name;
        return $model->save();
    }

    public function rules()
    {
        return [
            [['id', 'seq', 'tag_id', 'cargo_id'], 'integer'],
            [['tag_title', 'cargo_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {
            $model = new FoodCategory();
            return $this->setModelValues($model);
        }
        return false;
    }

    public function update()
    {
        if ($this->validate() && ($model = FoodCategory::findOne($this->id)) != null){
            return $this->setModelValues($model);
        }
    }

    public function find($id) 
    {
        if (($model = FoodCategory::findOne($id)) != null) {
            $this->seq = $model->seq;
            $this->tag_id = $model->tag_id;
            $this->tag_title = $model->tag_title;
            $this->cargo_id = $model->cargo_id;
            $this->cargo_name = $model->cargo_name;
            return true;
        }
        return false;
    }
}