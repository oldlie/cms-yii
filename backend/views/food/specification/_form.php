<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * 食品规格表单
 * 
 * @var yii\web\View $this
 * @var backend\models\food\CategoryForm $model
 * @var ActiveForm $form
 */

?>

    <?php $form = ActiveForm::begin(); ?>

        <?php
        if ($model->id > 0) {
            echo $form->field($model, 'id')->label('')->hiddenInput();
        }
        ?>

        <?= $form->field($model, 'cargo_id' )->input('number', ['readonly' => 'readonly']) ?>
        <?= $form->field($model, 'name')->input('text') ?>
        <?= $form->field($model, 'breed')->input('text') ?>
        <?= $form->field($model, 'origin')->input('text') ?>
        <?= $form->field($model, 'feature')->input('text') ?>
        <?= $form->field($model, 'store')->input('text') ?>
        <?= $form->field($model, 'spec')->input('text') ?>
        <?= $form->field($model, 'product_datetime')->input('text') ?>
        <?= $form->field($model, 'quota_policy')->input('text') ?>
        <?= $form->field($model, 'price' )->input('number') ?>
        <?= $form->field($model, 'inventory' )->input('number') ?>

        <div class="form-group">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

