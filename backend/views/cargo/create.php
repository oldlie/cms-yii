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
        <?= $this->render('_form', ['model' => $model])?>
    </div>

    </section>

</div>