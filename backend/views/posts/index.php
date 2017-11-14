<?php
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 401]); ?>

    <!-- Main content -->
    <section class="content">
        
    </section>

</div>
