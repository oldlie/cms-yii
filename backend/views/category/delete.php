<?php
use yii\helpers\Url;
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = 'Delete Category Info';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 401]); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?=$tip ?>
                </div>
            </div>
            <div class="col-sm-12">
                <a href="<?=Url::to(['index', 'id' => $parent])?>" class="btn btn-info">返回</a>
            </div>
        </div>
    </section>

</div>
