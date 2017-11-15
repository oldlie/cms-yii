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
    </div>

    <?php 
        $imagePath = $form->field($model, 'imagePath')->hiddenInput();
        $imagePath->template = '{input}';
        echo $imagePath->render();
    ?>
    <?= $form->field($model, 'image')->fileInput()->label('选择图片：') ?>
    <div class="form-group">
        <?= Html::submitButton( '提交', ['class' => 'btn btn-primary']) ?>
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
      <div class="modal-body">
        <div class="list-group" id="categoryList">
            <button type="button" class="list-group-item">上一级</button>
            <button type="button" class="list-group-item">test1</button>
            <button type="button" class="list-group-item">test2</button>
            <button type="button" class="list-group-item">test3</button>
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