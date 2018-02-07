<?php

namespace backend\models;

use Yii;
use \yii\base\Model;
use common\models\Cargo;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_des
 * @property string $warning_info
 * @property string $description
 * @property integer $status
 */
class CargoForm extends Model
{
    public $id;
    public $name;
    public $short_des;
    public $warning_info;
    public $description;
    public $status;

    /**
     * Short 
     * 
     * @inheritdoc
     * @return     array
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['description'], 'string'],
            [['name', 'short_des', 'warning_info'], 'string', 'max' => 255],
        ];
    }

    public function find($id)
    {
        if (($model = Cargo::findOne($id)) !== null) {
            $this->id = $model->id;
            $this->name = $model->name;
            $this->short_des = $model->short_des;
            $this->warning_info = $model->warning_info;
            $this->description = $model->description;
            $this->status = $model->status;
            return true;
        }
        return false;
    }

    /**
     * @param Cargo $model
     */
    private function setModelValues($model)
    {
        $model->name = $this->name;
        $model->short_des = $this->short_des;
        $model->warning_info = $this->warning_info;
        $model->description = $this->description;
        $model->status = $this->status;
    }

    public function update()
    {
        yii::trace('update');
        yii::trace($this->id);
        if (($model = Cargo::findOne($this->id)) !== null) {
            $this->setModelValues($model);
            return $model->save();
        }

        return false;
    }

    public function save()
    {
        Yii::trace('save');
        Yii::trace($this->name);
        if ($this->validate()) {
            $model = new Cargo();
            $this->setModelValues($model);
            return $model->save();
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
            'name' => '商品名称',
            'short_des' => '简要描述',
            'warning_info' => '提示信息',
            'description' => '详细描述',
            'status' => '商品状态',
        ];
    }
}
