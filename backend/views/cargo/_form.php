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
                    <thead> 
                        <tr>
                            <th>ID</th>
                            <th>规格名称</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="specTableBody"></tbody>
                </table>

            </div>
        
            <div class="from-group">
                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#tagModel">选择标签</button>
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
                        <div class="chart tab-pane" id="createSpecTab" style="position: relative; ">

                            <div class="col-sm-12" style="box-sizing:border-box;overflow:auto;height:100%;">

                                <div class="form-group">
                                    <label for="" class="control-label">规格名称</label>
                                    <input id="specNameInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">品种</label>
                                    <input id="breedInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">原产地</label>
                                    <input id="originInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">特征</label>
                                    <input id="featureInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">存储方式</label>
                                    <input id="storeInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">包装规格</label>
                                    <input id="specInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">采收加工</label>
                                    <input id="productDatetimeInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">限购</label>
                                    <input id="quotaInput" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">价格</label>
                                    <input id="priceInput" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">库存</label>
                                    <input id="inventoryInput" type="number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button id="newSpecBtn" class="btn btn-primary">选择并保存</button>
                                </div>
                            </div>
                            
                        </div>
                        <!-- ./ createSpecTab -->
                        <div class="chart tab-pane active" id="selectSpecTab" style="position: relative; ">
                            <div class="input-group margin col-sm-12 col-md-6">
                                <input id="specNameSearchInput" type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button id="specNameSearchBtn" type="button" class="btn btn-info btn-flat">按名称检索</button>
                                </span>
                            </div>
                            <!-- ./ search input-->
                            <div style="box-sizing:box-border;overflow:auto;height:100%">
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

                                
                                <div id="specPagenation"></div>
                            </div>

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

<div class="modal fade" id="tagModel" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><a href="#createSpecTab" data-toggle="tab">新建标签</a></li>
                        <li class="active"><a href="#selectSpecTab" data-toggle="tab">选择标签</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> 给商品添加标签</li>
                    </ul>
                    <div class="tab-content">
                        <div class="chart tab-pane" id="createSpecTab" style="position: relative; height: 300px;">
                            
                        </div>
                        <!-- ./ createSpecTab -->
                        <div class="chart tab-pane active" id="selectSpecTab" style="position: relative; height: 300px;">

                            <!-- ./ search input-->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:40px;">
                                            <input id="checkAll" type="checkbox">
                                        </th>
                                        <th style="width:60px;">序号</th>
                                        <th style="width:180px;">标签名称</th>
                                        <th style="width:80px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody id="tagTableContent"></tbody>
                            </table>

                            <button class="btn btn-default btn-sm" id="goParentTagBtn"><< 返回上级</button>
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

<?php
$listSpecUrl = Url::to(['/food/specification/ajax-list']);
$ajaxCreateSpec = Url::to(['/food/specification/ajax-create']);
$ajaxListTagUrl = Url::to(['/tag/ajax-list-tag']);

$js_def = <<< js
var ajaxListSpecUrl = '$listSpecUrl';
var ajaxCreateSpecUrl = '$ajaxCreateSpec';
var ajaxListTagUrl = '$ajaxListTagUrl';
js;

$this->registerJs($js_def, \Yii\web\View::POS_END);
$this->registerJsFile('@web/js/cargo/form.js', ['depends' => 'backend\assets\AppAsset']);
?>

