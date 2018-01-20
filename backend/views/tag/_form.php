<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\components\ImageUpload;

/* @var $this yii\web\View */
/* @var $model common\Models\TagForm */
/* @var $form ActiveForm */
?>
<div class="tag-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text') ?>
        <?= $form->field($model, 'icon') ?>

        <?= ImageUpload::widget(['id' => 'tag', 'name' => 'TagForm[file_path]'])?>
        <div class="form-group">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#parent_list_modal">选择上级标签</button>
        </div>
        <div class="form-group field-tagform-parent_id">
            <label class="control-label" for="tagform-parent_id">上级标签ID</label>
            <input type="text" id="tagform-parent_id" class="form-control" disabled="disabled" name="TagForm[parent_id]" value="<?=$model->parent_id?>">
            <div class="help-block"></div>
        </div>
        <div class="form-group field-tagform-parent_text">
            <label class="control-label" for="tagform-parent_text">上级标签</label>
            <input type="text" id="tagform-parent_text" class="form-control" name="TagForm[parent_text]" disabled="disabled" value="<?=$model->parent_text?>">
            <div class="help-block"></div>
        </div>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tag-_form -->

<div class="example-modal">
    <div class="modal fade" id="parent_list_modal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">选择上级目录</h4>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.example-modal -->