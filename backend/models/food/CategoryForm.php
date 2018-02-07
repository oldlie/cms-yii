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
 * @property string $title
 * @property integer $parent_id
 * @property string $parent_title
 * @property integer $children_count
 * @property string $path_id
 * @property string $path_title
 */
class CategoryForm extends Model
{
    public $id;
    public $seq;
    public $title;
    public $parent_id;
    public $parent_title;
    public $children_count;
    public $path_id;
    public $path_title;

    /**
     * 设置值
     * 
     * @param FoodCategory $model
     */
    private function setModelValues($model)
    {
        $model->seq = $this->seq;
        $model->title = $this->title;
        $model->parent_id = $this->parent_id;
    }

    public function rules()
    {
        return [
            [['seq', 'parent_id', 'children_count'], 'integer'],
            [['title', 'parent_title', 'path_id', 'path_title'], 'string', 'max' => 255],
        ];
    }

    public function save()
    {
        $model = new FoodCategory();

    }


}