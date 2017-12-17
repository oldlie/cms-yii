<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\Web\View;
use yii\widgets\ActiveForm;
use backend\components\MainSidebar;
use backend\components\LeftRightPagination;
use backend\components\listpanel\ListPanel;

/* @var $this yii\web\View */

$this->title = '发布文章';

?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 403]); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'posts-form',
        'action' => Url::to(['posts/publish']),
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12 col-md-8">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3><?= $model->title ?></h3>
                    </div>
                    <div class="box-body">

                        <?= $form->field($model, 'id', ['template' => '{input}'])->hiddenInput() ?>
                        <?= $form->field($model, 'categoryId', ['template' => '{input}'])->hiddenInput() ?>
                        <?= $form->field($model, 'image', ['template' => '{input}'])->hiddenInput() ?>
                        <?= $form->field($model, 'imageFile')->fileInput()->label('选择标题图片：') ?>
                        <?= $form->field($model, 'allowComment')->checkbox(['label' => '允许评论']) ?>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#categoryModel">选择所在栏目</button>

                    </div>
                    <div class="box-footer">
                        <?= Html::submitButton('发布文章', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <?php ActiveForm::end(); ?>
</div>

<div class="modal" id="categoryModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">选择文章所在栏目</h4>
            </div>
            <div class="modal-body">
            <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary">选择</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
</div>

<div id="callOut"></div>
<?php
$deleteDraftUrl = Url::to(['posts/ajax-delete-draft']);

$js = <<< JS
var deleteDraftUrl = '$deleteDraftUrl';
JS;
$this->registerJS($js, View::POS_BEGIN);

// $this->registerJsFile('@web/js/vue.js');
$this->registerJsFile('@web/iCheck/icheck.min.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('@web/js/posts/publish.js', ['depends' => 'backend\assets\AppAsset']);
?>