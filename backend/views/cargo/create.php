<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\Web\View;
use backend\components\MainSidebar;
use yii\helpers\Html;

$this->title = 'Add Cargo';
?>

<div class="content-wrapper" >
    <?= MainSidebar::widget(['active_menu' => 302]); ?>
    
    <!-- Main content -->
    <section class="content" >

    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">添加商品</div>
                </div>
                <div class="box-body">
                    <?= $this->render('_form', ['model' => $model])?>
                </div>
            </div>
        </div>
    </div>

    </section>

</div>