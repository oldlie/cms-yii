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
        商品列表
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <div class="col-sm-12">
            
            <div class="box box-default">
                <div class="box-header">
                    <div class="box-title with-border">
                        <div class="input-group margin col-sm-12 col-md-6">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">按名称检索</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div style="border-sizing:box-border;overflow:auto;">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:40px;">
                                    <input id="checkAll" type="checkbox">
                                </th>
                                <th style="width:180px;">商品名称</th>
                                <th>简要介绍</th>
                                <th style="width:60px;">状态</th>
                                <th style="width:80px;">操作</th>
                            </tr>
                            <?php

                            foreach ($list as $cargo) {
                                $color = $text = '';
                                switch ($cargo['status']) {
                                    case 1:
                                        $color = 'bg-green';
                                        $text = '已上架';
                                        break;
                                    case 2:
                                        $color = 'bg-red';
                                        $text = '缺货';
                                        break;
                                    default:
                                        $color = 'bg-yellow';
                                        $text = '未上架';
                                        break;
                                }
                                $status_html = '<small class="label ' . $color . '">' . $text . '</small>';
                                echo '<tr>' .
                                    '<td><input class="item-check" type="checkbox" value="' . $cargo['id'] . '"></td>' .
                                    '<td>' . $cargo['name'] . '</td>' .
                                    '<td>' . $cargo['short_des'] . '</td>' .
                                    '<td id="td_status_' . $cargo['id'] . '">' . $status_html . '</td>' .
                                    '<td>' .
                                    Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $cargo['id']]) . '&nbsp;&nbsp;' .
                                    Html::a(
                                    '<i class="fa fa-trash"></i>',
                                    ['delete', 'id' => $cargo['id']],
                                    [
                                        'class' => 'text-red',
                                        'data' => [
                                            'confirm' => '确实要删除?',
                                            'method' => 'post',
                                        ]
                                    ]
                                ) .
                                    '</td>' .
                                    '</tr>';
                            }

                            ?>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <button id="onlineBtn" type="button" class="btn btn-success">上架</button>
                    <button id="offlineBtn" type="button" class="btn btn-warning">下架</button>
                    <!--button type="button" class="btn btn-danger">删除</button-->
                </div>
            </div>

            </div>
        </div>

    </section>

</div>

<div id="callOut"></div>

<?php

$updateUrl = Url::to(['ajax-status']);

$js_def = <<< js
var updateStatusUrl = '$updateUrl';
var message = '$message';
js;

$this->registerJs($js_def, \Yii\web\View::POS_END);
$this->registerJsFile('@web/js/cargo.js', ['depends' => 'backend\assets\AppAsset']);
?>