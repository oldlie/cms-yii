<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\Web\View;
use backend\components\MainSidebar;
use yii\helpers\Html;

$this->title = 'Tag List';
?>

<div class="content-wrapper" >
    <?= MainSidebar::widget(['active_menu' => 301]); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        标签列表
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:20px">#</th>
                        <th>名称</th>
                        <th>图形文件</th>
                        <th>上级标签ID</th>
                        <th>操作</th>
                    </tr>
                    <?php
                    if ($list) {
                        foreach ($list as $item) {
                            $img = '/uploads/image/1.jpg';
                            if ($item['t_icon_file'] && $item['t_icon_file'] != '') {
                                $img = '/uploads/' . $item['t_icon_file'];
                            }
                            echo '<tr><td>' . $item['id'] . '</td>' .
                                '<td>' . $item['t_text'] . '</td>' .
                                '<td><img src="' . $img . '" width="32px" height="32px;"></td>' .
                                '<td>' . $item['parent_text'] . '</td>' .
                                '<td>' .
                                Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $item['id']], [
                                    'class' => 'text-bule',
                                ]) .
                                Html::a('<i class="fa fa-trash"></i>', 
                                    ['delete', 'id' => $item['id']], 
                                    [
                                    'class' => 'text-red',
                                    'data' => [
                                        'confirm' => '确实要删除?',
                                        'method' => 'post',
                                    ]
                                ]) .
                                '</td></tr>';
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </section>
    <!-- ./ Main content -->
</div>

<div id="callOut"></div>

<?php
$js_end = <<< js
$(function () {
    var callout = new CallOut('#callOut');
    callout.warning('$message');
});
js;

if ($message) {
    $this->registerJs($js_end, \Yii\web\View::POS_END);
}
?>
