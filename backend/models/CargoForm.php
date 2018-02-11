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
 * @property string $spec_id_list
 * @property string $spec_name_list;
 * @property string $tag_id_list
 * @property string $tag_title_list;
 */
class CargoForm extends Model
{
    public $id;
    public $name;
    public $short_des;
    public $warning_info;
    public $description;
    public $status;
    public $spec_id_list;
    public $spec_name_list;
    public $tag_id_list;
    public $tag_title_list;

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
            [['name', 'short_des', 'warning_info', 'spec_id_list', 'tag_id_list'], 'string', 'max' => 255],
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

            $this->clearSpec();
            $this->setSpec();

            $this->clearTag();
            $this->setTag();

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
            
            $this->setSpec();
            $this->setTag();

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

    protected function setSpec()
    {
        $spec_id_list = explode(',', $this->spec_id_list);
        $length =  count($spec_id_list);
        if ($spec_id_list && $length > 0) {
            $where = 'id=' . $spec_id_list[0];
            for ($i = 1; $i < $length; $i++) {
                $where .= ' or id=' . $spec_id_list[$i];
            }
            $where .= ' ';
            Yii::$app->db->createCommand(
                'UPDATE food_spec SET cargo_id=' . $this->id . ' WHERE ' . $where)
                ->execute();
        }
    }

    protected function clearSpec()
    {
        Yii::$app->db->createCommand(
            'UPDATE food_spec SET cargo_id= 0 WHERE cargo_id=' . $this->id)
            ->execute();
    }

    protected function setTag() 
    {
        $tag_id_list = explode(',', $this->tag_id_list);
        $length = count($tag_id_list);
        if ($tag_id_list && $length > 0) {
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();
            try {
                for($i = 0; $i < $leng; $i++) {
                    $sql = 'INSERT INTO food_category (tag_id, cargo_id) VALUES ('. $tag_id_list[$i] .', '. $this->id .')';
                    $db->createCommand($sql)->execute();
                }
                $transaction->commit();
            } catch(\Exception $e) {
                Yii::trace($e->getMessage());
                $transaction->rollBack();
            }
        }
    }

    protected function clearTag()
    {
        Yii::$app->db->createCommand(
            'DELETE FROM food_category WHERE cargo_id=' . $this->id)
            ->execute();
    }
}
