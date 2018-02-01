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
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                <input type="checkbox">
                            </th>
                            <th>商品名称</th>
                            <th>简要介绍</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>沱湖螃蟹</td>
                            <td>国家地理标志</td>
                            <td><small class="label bg-yellow">未上架</small></td>
                            <td>
                                <a href="#"><i class="fa fa-edit"></i></a>
                                <a href="#"><i class="fa fa-tag"></i></a>
                                <a href="#"><i class="fa fa-trash text-red"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-success">上架</button>
                    <button type="button" class="btn btn-warning">下架</button>
                    <button type="button" class="btn btn-danger">删除</button>
                </div>
            </div>

            </div>
        </div>

    </section>

</div>