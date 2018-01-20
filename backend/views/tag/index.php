<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\Web\View;
use backend\components\MainSidebar;

$this->title = 'Tag List';
?>

<div class="content-wrapper" >
    <?= MainSidebar::widget(['active_menu' => 301]); ?>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header box-border">
                <div class="box-title">标签列表</div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="60px">#</th>
                        <th>名称</th>
                        <th style="60px">icon</th>
                        <th>图形文件</th>
                        <th>上级标签ID</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>沱湖</td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td>
                            <a href="#" class="text-bule" ><span class="fa fa-edit"></span></a>
                            <a href="#" class="text-red" ><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>螃蟹</td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </section>
    <!-- ./ Main content -->
</div>


