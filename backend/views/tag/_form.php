<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\components\ImageUpload;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\Models\TagForm */
/* @var $form ActiveForm */
?>
<div class="tag-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text') ?>
        
        <?= ImageUpload::widget(['id' => 'tag', 'name' => 'TagForm[file_path]', 'path' => $model['file_path']]) ?>

        <div class="form-group ">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#parent_list_modal">选择上级标签</button>
        </div>
        <div class="form-group field-tagform-parent_id col-sm-12 col-md-6">
            <label class="control-label" for="tagform-parent_id">上级标签ID</label>
            <input type="text" id="tagform-parent_id" class="form-control" readonly name="TagForm[parent_id]" value="<?= $model->parent_id ?>">
            <div class="help-block"></div>
        </div>
        <div class="form-group field-tagform-parent_text col-sm-12 col-md-6">
            <label class="control-label" for="tagform-parent_text">上级标签</label>
            <input type="text" id="tagform-parent_text" class="form-control" name="TagForm[parent_text]" readonly value="<?= $model->parent_text ?>">
            <div class="help-block"></div>
        </div>
       
    
        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tag-_form -->

<div class="example-modal">
    <div class="modal fade" id="parent_list_modal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">选择上级标签</h4>
            </div>
            <div class="modal-body">
            
                <ol class="breadcrumb" id="breadcrumb"></ol>
                
                <hr>

                <div style="box-sizing:box-border;height:400px;overflow-y:auto;">
                    <table id="tag_table" class="table table-bordered">
                        <div id="tag_table_overlay" class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.example-modal -->

<?php
$loadUrl = Url::to(['tag/ajax-list-tag', 'id' => 0]);

$js_def = <<< js
var load_url = '$loadUrl';
js;

$this->registerJs($js_def, \Yii\web\View::POS_END);
$this->registerJsFile('@web/js/tag.js', ['depends' => 'backend\assets\AppAsset']);
?>