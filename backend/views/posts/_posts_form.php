<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'posts-form',
    'action' => Url::to(['posts/publish']),
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">写作</h3>
                    </div>
                    <div class="box-body">
                        <?= $temp = $form->field($model, 'id', ['template' => '{input}'])->hiddenInput() ?>
                        <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('标题：') ?>
                        <?= $form->field($model, 'slug', ['template' => '{input}'])->hiddenInput() ?>
                        <?= $form->field($model, 'abstract')->textarea() ?>
                        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
                            'clientOptions' => [
                                'imageManagerJson' => ['/redactor/upload/image-json'],
                                'lang' => 'zh_cn',
                                'plugins' => ['clips', 'fontcolor', 'imagemanager'],
                                'minHeight' => 600
                            ]
                        ]) ?>
                    </div><!-- ./box-body -->
                    <div class="box-footer">
                        <?= Html::button('保存草稿', ['id' => 'saveDraftBtn', 'class' => 'btn btn-default']) ?>
                        <?= Html::button('发布文章', ['id' => 'publishBtn', 'class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div> <!-- ./ col-md-8 -->

            <div class="col-sm-12 col-md-4">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">发布设置</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            每隔<input id="autoSaveDraftInput" type="number" class="short-input-text" value="15">秒自动保存草稿
                            <button id="autoSaveDraftBtn" type="button" class="btn btn-default">设置</button>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'image', ['template' => '{input}'])->hiddenInput() ?>
                            <?php
                            if ($model->image != '') {
                                echo '<img id="uploadImg" class="img-responsive" src="'. $url . '/' . $model->image . '">';
                            } else {
                                echo '<img id="uploadImg" class="img-responsive" src="'. $url .'/image/1.jpg">';
                            }
                            ?>
                            <input id="uploadImageFile" type="file" class="form-control">
                            <button id="uploadImageBtn" type="button" class="btn btn-default wide-btn">上传图片</button>
                        </div>
                        <div class="form-group">
                            <?=$form->field($model, 'comment_status')->checkbox()?>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default wide-btn" data-toggle="modal" data-target="#myModal">选择栏目</button>
                            当前选择：
                            <label id="parentTxtLabel"><?=$model->category_text?></label>
                            <?=$form->field($model, 'category', ['template' => '{input}'])->hiddenInput()?>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- ./ first row -->

    <?php ActiveForm::end(); ?>

    <div id="callOut"></div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">选择上一级分类</h4><small>点击进入子菜单</small>
      </div>
      <div class="modal-body" id="categoryListPanel"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
$saveNewPostUrl = Url::to(['posts/ajax-save']);
$updateNewPostUrl = Url::to(['posts/ajax-update']);
$uploadImaegUrl = Url::to(['posts/ajax-upload-image']);

$JS_DEF = <<< js
var saveNewPostUrl = '$saveNewPostUrl';
var updateNewPostUrl = '$updateNewPostUrl';
var uploadImaegUrl = '$uploadImaegUrl';
js;

$this->registerJs($JS_DEF, \Yii\web\View::POS_BEGIN);
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