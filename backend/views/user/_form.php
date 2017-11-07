<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'user-form'
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('账号：') ?>
    <?= $form->field($model, 'password')->passwordInput()->label('密码：') ?>
    <?= $form->field($model, 'email')->input('email')->label('邮箱：') ?>

    <div class="form-group">
        <?= Html::submitButton( '提交', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
