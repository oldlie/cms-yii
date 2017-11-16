<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = '系统设置';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 102]); ?>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">系统设置</h3>
                    </div>

                    <?php $form = ActiveForm::begin([
                        'id' => 'system-setting-form',
                        'options' => ['enctype' => 'multipart/form-data']
                    ]); ?>

                    <div class="box-body">
                        <?= $form->field($model, 'website_name')->input('text')->label('网站名称：')?>
                        <?= $form->field($model, 'website_summary')->textarea()->label('网站简介：')?>
                        <?= $form->field($model, 'website_keys')->textarea()->label('网站关键词')?>
                        <?= $form->field($model, 'icp')->input('text')->label('网站 ICP 备案号')?>
                        <?= $form->field($model, 'upload_url')->input('text')->label('上传目录外部访问 URL 地址：')?>
                        <?= $form->field($model, 'upload_path')->input('text')->label('上传文件存放绝对路径：')?>
                        <?= $form->field($model, 'satic_path')->input('text')->label('static 目录资源 URL 地址：')?>
                    </div><!-- ./box-body -->

                    <div class="box-footer">
                        <?= Html::submitButton( '修改', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    </section>

</div>
