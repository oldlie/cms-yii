<?php
use backend\components\MainSidebar;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 404]); ?>

    <!-- Main content -->
    <section class="content">
        <?= $this->render('_posts_form', [
            'url' => $url,
            'model' => $model
        ]) ?>
    </section> <!-- ./ content -->

</div>
