<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "top_cargo".
 *
 * @property integer $id
 * @property string $seq
 * @property integer $cargo_id
 */
class TopCargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_id'], 'integer'],
            [['seq'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seq' => '序号',
            'cargo_id' => '首页显示的商品ID',
        ];
    }
}
