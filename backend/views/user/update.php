<?php

use yii\helpers\Html;
use backend\components\MainSidebar;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 201]); ?>

    <!-- Main content -->
    <section class="content">
        <div class="user-update">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </section>

</div>


