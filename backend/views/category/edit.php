<?php
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = 'Update Category';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 402]); ?>

    <!-- Main content -->
    <section class="content">
        
        <div class="col-sm-12 col-md-6">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">编辑栏目</h3>
                </div>

                <div class="box-body">
                    <?php if ($tip !== '') {?>
                    <div class="alert alert-warning alert-dismissible">
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?=$tip ?>
                    </div>
                    <?php }?>
                    <?= $this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>

    </section>

</div>
