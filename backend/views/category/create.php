<?php
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 402]); ?>

    <!-- Main content -->
    <section class="content">
        
        <div class="col-sm-12 col-md-6">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">创建栏目</h3>
                </div>

                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>

    </section>

</div>
