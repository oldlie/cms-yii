<?php

use yii\helpers\Html;
use yii\helpers\Url;

$uploadUrl = Url::to(['file/ajax-upload-image']);
$progressId = $id . '_progress';
$imageId = $id . '_image';
$imagePathId = $id . '_image_path';
$uploadBtn = $id . '_upload_btn';
$fileInputId = $id . '_file_input';
$fileInputGroupId = $id . '_file_input_group';
$progressGroupId = $id . '_progress_group';
$JS_DEF = <<< js
var upload_url = '$uploadUrl';
var progress_name = '#' + '$progressId';
var image_id = '#' + '$imageId';
var image_path_id = '#' + '$imagePathId';
var upload_btn = '#' + '$uploadBtn';
var file_input_id = '$fileInputId';
var file_input_group_id = '#' + '$fileInputGroupId';
var progress_group_id =  '#' + '$progressGroupId';
js;

$this->registerJs($JS_DEF, \Yii\web\View::POS_BEGIN);
$this->registerJsFile('@web/js/file.js', ['depends' => 'backend\assets\AppAsset']);
?>
<div class="form-group field-tagform-file_path">
    <label class="control-label" for="tagform-file_path">图像文件</label>
    <div id="<?=$progressGroupId?>" class="progress hide">
        <div id="<?=$progressId?>" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        <span class="sr-only">0% Complete (success)</span>
        </div>
    </div>
    <div id="<?=$fileInputGroupId?>" class="input-group margin ">
        <div class="input-group-btn">
            <button id="<?=$uploadBtn?>" type="button" class="btn btn-default">上传图像文件</button>
        </div>
        <input id="<?=$fileInputId?>" type="file" class="form-control" id="image_file">
    </div>
    <input type="hidden" id="<?=$imagePathId?>" class="form-control" name="<?=$name?>" value="<?= $path ?>">
    <div class="help-block"></div>
</div>
<div class="row" style="margin-bottom:10px;">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            
            <div class="col-sm-12 col-md-6">
                <img id="<?=$imageId?>" src="<?=$url . $path?>" class="img-responsive" alt="Responsive image">
            </div>
        </div>
    </div>
</div>