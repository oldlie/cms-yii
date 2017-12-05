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
                    <div class="box-header">
                        <h3><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer">
                        <?= Html::submitButton('发布', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <?php ActiveForm::end(); ?>
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