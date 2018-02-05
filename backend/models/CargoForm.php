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
 */
class CargoForm extends Model
{
    public $id;
    public $name;
    public $short_des;
    public $warning_info;
    public $description;


    /**
     * Short 
     * 
     * @inheritdoc
     * @return     array
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description'], 'string'],
            [['name', 'short_des', 'warning_info'], 'string', 'max' => 255],
        ];
    }

    public function find($id)
    {
        if (($model = User::findOne($id)) !== null) {
            $this->id = $model->id;
            $this->name = $model->name;
            $this->short_des = $model->short_des;
            $this->warning_info = $model->warning_info;
            $this->description = $model->description;
            return true;
        }
        return false;
    }

    public function update()
    {
        if (($model = Cargo::findOne($id)) !== null) {
            $model->name = $this->name;
            $model->short_des = $this->short_des;
            $model->waring_info = $this->waring_info;
            $model->description = $this->description;
            return $this->save();
        }

        return false;
    }

    public function save()
    {
        Yii::trace('save');
        Yii::trace($this->name);
        if ($this->validate()) {
            $model = new Cargo();
            $model->name = $this->name;
            $model->short_des = $this->short_des;
            $model->warning_info = $this->warning_info;
            $model->description = $this->description;
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
        ];
    }
}
