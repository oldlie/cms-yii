<?php
use backend\components\MainSidebar;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = '食品规格列表';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 303]); ?>

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
                    <!-- ./ box-header -->

                    <div class="box-body">
                        <div style="border-sizing:box-border;overflow:auto;">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:40px;">
                                        <input id="checkAll" type="checkbox">
                                    </th>
                                    <th style="width:60px;">序号</th>
                                    <th style="width:180px;">规格名称</th>
                                    <th>规格特征</th>
                                    <th>价格</th>
                                    <th style="width:60px;">库存</th>
                                    <th style="width:80px;">操作</th>
                                </tr>
                                <?php

                                foreach ($list as $spec) {
                                    echo '<tr>' .
                                        '<td><input class="item-check" type="checkbox" value="' . $spec['id'] . '"></td>' .
                                        '<td>' . $spec['id'] . '</td>' .
                                        '<td>' . $spec['name'] . '</td>' .
                                        '<td>' . $spec['feature'] . '</td>' .
                                        '<td>￥' . $spec['price'] . '</td>' .
                                        '<td>' . $spec['inventory'] . '</td>' .
                                        '<td>' .
                                        Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $spec['id']]) . '&nbsp;&nbsp;' .
                                        Html::a(
                                        '<i class="fa fa-trash"></i>',
                                        ['delete', 'id' => $spec['id']],
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
                    <!-- ./ box-body -->

                </div>
            </div>
        </div>
    </section>

</div>
