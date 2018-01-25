<?php
use backend\components\MainSidebar;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = 'Tag Create';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 602]); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        编辑标签
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="box box-default">
            <div class="box-body">
                <?= $this->render('_form', ['model' => $model]);?>
            </div>
            <div class="box-footer"></div>
        </div>

    </section>

</div>