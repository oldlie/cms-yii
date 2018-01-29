<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\Web\View;
use backend\components\MainSidebar;
use yii\helpers\Html;

$this->title = 'Cargo List';
?>

<div class="content-wrapper" >
    <?= MainSidebar::widget(['active_menu' => 301]); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Create Food Spec
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