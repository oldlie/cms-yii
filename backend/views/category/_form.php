<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'category-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?php 
        $id = $form->field($model, 'id')->hiddenInput();
        $id->template = '{input}';
        echo $id->render();
    ?>
    <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('栏目名称：') ?>
    <?= $form->field($model, 'comment')->textInput()->label('简介：') ?>
    <?= $form->field($model, 'parent')->input('number')->label('父节点：') ?>
    <?php 
        $imagePath = $form->field($model, 'imagePath')->hiddenInput();
        $imagePath->template = '{input}';
        echo $imagePath->render();
    ?>
    <?= $form->field($model, 'image')->fileInput()->label('选择图片：') ?>
    <div class="form-group">
        <?= Html::submitButton( '提交', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
