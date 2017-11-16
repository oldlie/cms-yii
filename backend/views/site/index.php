<?php

use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = '后台管理';
?>
<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 101]); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Fixed Layout
        <small>Blank example to the fixed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
    </section>

</div>
