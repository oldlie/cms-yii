<?php

use yii\helpers\Html;
use backend\components\MainSidebar;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 202]); ?>

    <!-- Main content -->
    <section class="content col-sm-12 col-md-6">

        <div class="box box-default">

            <div class="box-header">
                <h3 class="box-title">创建用户账号</h3>
            </div>

            <div class="box-body">
                <div class="user-create">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>

        
    </section>

</div>


