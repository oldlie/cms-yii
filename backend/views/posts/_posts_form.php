<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

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
                        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
                            'clientOptions' => [
                                'imageManagerJson' => ['/redactor/upload/image-json'],
                                'lang' => 'zh_cn',
                                'plugins' => ['clips', 'fontcolor','imagemanager']
                            ]
                        ]) ?>
                    </div><!-- ./box-body -->
                    <div class="box-footer">
                        <?= Html::button('保存', ['id' => 'saveDraftBtn', 'class' => 'btn btn-default']) ?>
                        <?= Html::submitButton('发布', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div> <!-- ./ col-md-8 -->
            <div class="col-sm-12 col-md-8">
                
            </div>
        </div> <!-- ./ first row -->

    <?php ActiveForm::end(); ?>

<?php
$this->registerJsFile('@web/js/posts.js', ['depends' => 'backend\assets\AppAsset']);

/*
$this->registerCssFile('@web/umeditor1.2.3/themes/default/css/umeditor.min.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/umeditor1.2.3/third-party/template.min.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/umeditor1.2.3/third-party/mathquill/mathquill.min.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/umeditor1.2.3/umeditor.config.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/umeditor1.2.3/umeditor.min.js', ['depends' => 'backend\assets\AppAsset']);

$css = <<< css
.box-body .edui-container {z-index:9000;}
css;
$this->registerCss($css);
*/
?>