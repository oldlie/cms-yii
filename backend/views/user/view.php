<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use backend\components\MainSidebar;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 201]); ?>

    <!-- Main content -->
    <section class="content">

        <div class="user-view">

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'nickname',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    'email:email',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>

        </div>
    </section>

</div>


