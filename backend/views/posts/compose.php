<?php
use backend\components\MainSidebar;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 404]); ?>

    <!-- Main content -->
    <section class="content">

    <?php $form = ActiveForm::begin([
        'id' => 'posts-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">写作</h3>
                    </div>
                    <div class="box-body">
                    <?php 
                    // print_r($model);
                    $temp = $form->field($model, 'id')->hiddenInput();
                    $temp->template = '{input}';
                    echo $temp->render();
                    ?>
                    <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('标题：') ?>
                    <?= $form->field($model, 'slug')->textInput()->label('标题唯一：') ?>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div> <!-- ./ col-md-8 -->
            <div class="col-sm-12 col-md-8">
                
            </div>
        </div> <!-- ./ first row -->

    <?php ActiveForm::end(); ?>

    </section> <!-- ./ content -->

</div>
