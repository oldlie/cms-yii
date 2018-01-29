<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CargoForm */
/* @var $form ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'short_des') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'warning_info')->widget(\yii\redactor\widgets\Redactor::className(), [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor', 'imagemanager'],
                'minHeight' => 600
            ]
        ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

