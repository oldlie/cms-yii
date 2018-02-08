<?php
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = '编辑食品规格';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 303]); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-title">编辑食品规格</div>
                    </div>
                    <div class="box-body">
                        <?= $this->render('_form', ['model' => $model])?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
