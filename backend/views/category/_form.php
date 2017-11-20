<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'category-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?php 
    $id = $form->field($model, 'id')->hiddenInput();
    $id->template = '{input}';
    echo $id->render();
    ?>
    <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('栏目名称：') ?>
    <?= $form->field($model, 'comment')->textInput()->label('简介：') ?>
    
    <div class="form-group">
        <button class="btn btn-default" data-toggle="modal" data-target="#myModal">选择上一级分类</button>
        <label id="parentTxtLabel">根目录</label>
        <?php 
        $parent = $form->field($model, 'parent')->hiddenInput();
        $parent->template = '{input}';
        echo $parent->render();
        ?>
    </div>

    <?php 
    $imagePath = $form->field($model, 'imagePath')->hiddenInput();
    $imagePath->template = '{input}';
    echo $imagePath->render();
    ?>
    <?= $form->field($model, 'image')->fileInput()->label('选择图片：') ?>
    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">选择上一级分类</h4><small>点击进入子菜单</small>
      </div>
      <div class="modal-body" id="categoryListPanel">
        <div class="btn-group" style="width:100%;">
            <button type="button" class="btn btn-default root-btn" style="min-width:326px;">根目录</button>
        </div>
        
        <div class="btn-group" style="width:100%;">
            <button type="button" class="btn btn-default" style="min-width:300px;">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu" style="min-width:326px;">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
$this->registerJsFile('@web/js/navigation.js', ['depends' => ['backend\assets\AppAsset']]);
?>