<?php

namespace backend\models;

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
 * @property string $store 存储方式
 * @property string $product_datetime 生产日期
 * @property string $quota_policy 限购政策
 * @property integer $price 价格
 * @property integer $inventory 库存
 */

class FoodspecForm extends Model
{
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
            [['cargo_id', 'price', 'inventory'], 'integer'],
            [['name', 'origin', 'breed', 'feature', 'spec', 'store', 'product_datetime', 'quota_policy'], 'string', 'max' => 255],
        ];
    }


    public function create()
    {
        if ($this->validate()) {
            $model = new FoodSpec();
            $model->cargo_id = $this->cargo_id;
            $model->name = $this->name;
            $model->breed = $this->breed;
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
        return false;
    }

    public function update($id)
    {
        if (($model = FoodSpec::findOne($id)) != null) {
            $model->cargo_id = $this->cargo_id;
            $model->name = $this->name;
            $model->breed = $this->breed;
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
        return false;
    }

    public function find($id) {
        if (($model = FoodSpec::findOne($id)) != null) {
            $this->cargo_id = $model->cargo_id;
            $this->name = $model->name;
            $this->breed = $model->breed;
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
            'short_des' => '简要描述',
            'price' => '价格',
            'inventory' => '库存',
            'warning_info' => '提示信息',
            'description' => '详细描述',
        ];
    }
}