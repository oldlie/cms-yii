<?php

namespace backend\models\food;

use Yii;
use Yii\base\Model;
use common\models\FoodSpec;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $id
 * @property integer $cargo_id
 * @property string $name
 * @property string $origin 原产地
 * @property string $feature 特征
 * @property string $spec 规格
 * @property string $store 存储方式
 * @property string $product_datetime 生产日期
 * @property string $quota_policy 限购政策
 * @property integer $price 价格
 * @property integer $inventory 库存
 */

class SpecificationForm extends Model
{
    public $id;
    public $cargo_id;
    public $name;
    public $origin;
    public $breed;
    public $feature;
    public $spec;
    public $store;
    public $product_datetime;
    public $quota_policy;
    public $price;
    public $inventory;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cargo_id', 'price', 'inventory'], 'integer'],
            [['name', 'origin', 'breed', 'feature', 'spec', 'store', 'product_datetime', 'quota_policy'], 'string', 'max' => 255],
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $model = new FoodSpec();
            return $this->setModelValues($model);
        }
        return false;
    }

    public function update($id)
    {
        if (($model = FoodSpec::findOne($id)) != null) {
            return $this->setModelValues($model);
        }
        return false;
    }

    public function find($id) {
        if (($model = FoodSpec::findOne($id)) != null) {
            $this->cargo_id = $model->cargo_id;
            $this->name = $model->name;
            $this->breed = $model->category;
            $this->origin = $model->origin;
            $this->feature = $model->feature;
            $this->spec = $model->spec;
            $this->store = $model->store;
            $this->product_datetime = $model->product_datetime;
            $this->quota_policy = $model->quota_policy;
            $this->price = $model->price;
            $this->inventory = $model->inventory;
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
            'cargo_id' => '商品ID',
            'name' => '规格名称',
            'origin' => '原产地',
            'breed' => '品种',
            'feature' => '特征',
            'spec' => '包装规格',
            'store' => '存储方式',
            'product_datetime' => '采收加工',
            'quota_policy' => '限购',
            'price' => '价格',
            'inventory' => '库存',
        ];
    }

    /**
     * @param common\models\FoodSpec $model
     * @return bool 
     */
    private function setModelValues($model)
    {
        $model->cargo_id = $this->cargo_id;
        $model->name = $this->name;
        $model->category = $this->breed;
        $model->origin = $this->origin;
        $model->feature = $this->feature;
        $model->spec = $this->spec;
        $model->store = $this->store;
        $model->product_datetime = $this->product_datetime;
        $model->quota_policy = $this->quota_policy;
        $model->price = $this->price;
        $model->inventory = $this->inventory;
        return $model->save();
    }
}