<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => ''],
    ]); ?>

    <?php // = $form->field($model, 'id') ?>

    <div class="row">
        <div class="col-sm-12 col-md-4">
            <input type="text" class="form-control" name="UserSearch[username]" placeholder="用户名">
        </div>
        <div class="col-sm-12 col-md-4">
            <input type="text" class="form-control" name="UserSearch[email]" placeholder="邮箱">
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search"></i> 搜索', ['class' => 'btn btn-primary']) ?>
                <a href="<?= Url::to(['user/create']); ?>" class="btn btn-default">
                    <i class="fa fa-plus"></i> 
                    <span>添加</span>
                </a>
            </div>
        </div>
    </div>
    
    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    

    <?php ActiveForm::end(); ?>

</div>
