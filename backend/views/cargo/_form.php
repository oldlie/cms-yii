<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\CargoForm */
/* @var $form ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="col-sm-12 col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">添加商品</div>
        </div>
        <div class="box-body">
            <?php
            if ($model->id > 0) {
                echo $form->field($model, 'id')->label('')->hiddenInput();
            }
            ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'short_des') ?>
            <?= $form->field($model, 'warning_info') ?>

            <?= $form->field($model, 'status')->dropDownList(
                [0 => '未上架', 1 => '已上架', 2 => '缺货/售罄'], 
                ['class' => 'form-control']) 
            ?>

            <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'imageManagerJson' => ['/redactor/upload/image-json'],
                    'lang' => 'zh_cn',
                    'plugins' => ['clips', 'fontcolor', 'imagemanager'],
                    'minHeight' => 600
                ]
            ]) ?>

             <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">添加规格和标签</div>
        </div>
        <div class="box-body">

            <div class="form-group">
                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#specModel">选择规格</button>    

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>规格名称</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>童子鸡套餐</td>
                        <td><a href="#" class="text-red"><i class="fa fa-trash"></i></a></td>
                    </tr>
                </table>
            </div>
        
            <div class="from-group">
                <button type="button" class="btn btn-default btn-block">选择标签</button>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>标签</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>散养鸡</td>
                        <td>
                            <a href="#" class="text-red"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>       
<?php ActiveForm::end(); ?>

<div class="modal fade" id="specModel" tabindex="-1" role="dialog" aria-labelledby="specModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><a href="#createSpecTab" data-toggle="tab">新建规格</a></li>
                        <li class="active"><a href="#selectSpecTab" data-toggle="tab">选择规格</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> 给商品添加规格</li>
                    </ul>
                    <div class="tab-content">
                        <div class="chart tab-pane" id="createSpecTab" style="position: relative; height: 300px;">
                            
                        </div>
                        <!-- ./ createSpecTab -->
                        <div class="chart tab-pane active" id="selectSpecTab" style="position: relative; height: 300px;">
                            <div class="input-group margin col-sm-12 col-md-6">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat">按名称检索</button>
                                </span>
                            </div>
                            <!-- ./ search input-->
                            <table class="table table-bordered">
                                <thead>
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
                                </thead>
                                <tbody id="specTableContent"></tbody>
                            </table>
                        </div>
                        <!-- ./ selectSpecTab -->
                    </div>
                </div>



            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="specModel" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><a href="#createSpecTab" data-toggle="tab">新建规格</a></li>
                        <li class="active"><a href="#selectSpecTab" data-toggle="tab">选择规格</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> 给商品添加规格</li>
                    </ul>
                    <div class="tab-content">
                        <div class="chart tab-pane" id="createSpecTab" style="position: relative; height: 300px;">
                            
                        </div>
                        <!-- ./ createSpecTab -->
                        <div class="chart tab-pane active" id="selectSpecTab" style="position: relative; height: 300px;">
                            <div class="input-group margin col-sm-12 col-md-6">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat">按名称检索</button>
                                </span>
                            </div>
                            <!-- ./ search input-->
                            <table class="table table-bordered">
                                <thead>
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
                                </thead>
                                <tbody id="specTableContent"></tbody>
                            </table>
                        </div>
                        <!-- ./ selectSpecTab -->
                    </div>
                </div>



            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /. html template -->
<div class="hide">
    <div id="tagTdHtmlTemp">
        <tr>
            <td></td>
        </tr>
    </div>
</div>
<!-- /. html template -->

<?php
$listSpecUrl = Url::to(['/food/specification/ajax-list']);

$js_def = <<< js
var listSpecUrl = '$listSpecUrl';
js;

$this->registerJs($js_def, \Yii\web\View::POS_END);
$this->registerJsFile('@web/js/cargo/form.js', ['depends' => 'backend\assets\AppAsset']);
?>

