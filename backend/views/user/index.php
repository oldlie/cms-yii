<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;

use backend\components\MainSidebar;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$formatter = \Yii::$app->formatter;
?>
<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 201]); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        后台用户管理
        <small>设置后台用户</small>
        </h1>
        <ol class="breadcrumb">
            <li><?= Html::a('用户与权限', ['user/index']) ?> </li>
            <li class="active">后台用户</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">账户列表</h3>
            </div>

            <div class="box-body">
            
                <div class="row">
                    <div class="col-sm-12">
                    <?php echo $this->render('_search.php', [
                        'model' => new backend\models\UserSearch()
                    ]);?>
                    </div>
                </div>

                <div class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-6 text-right">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr row="row">
                                        <th>ID</th>
                                        <th>后台用户</th>
                                        <th>邮件</th>
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $user) {
                                    echo '<tr>' 
                                    . '<td>' . $user['id'] . '</td>'
                                    . '<td>' . $user['username'] . '</td>'
                                    . '<td>' . $user['email'] . '</td>'
                                    . '<td>' . $formatter->asDatetime($user['updated_at']) . '</td>'
                                    . '<td>'
                                    //. '<a href="' . Url::to(['user/delete', 'id' => $user['id']]) . '"><i class="fa fa-trash"></i></a> '
                                    . Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $user['id']], [
                                        'class' => '',
                                        'data' => [
                                            'confirm' => '确实要删除?',
                                            'method' => 'post',
                                        ]
                                    ])
                                    . ' <a href="' . Url::to(['user/update', 'id' => $user['id']]) . '"><i class="fa fa-edit"></i></a> '
                                    . '<a href="' . Url::to(['user/view', 'id' => $user['id']]) . '"><i class="fa fa-list"></i></a>'
                                    . '</td>'
                                    .'</tr>';
                                }?>
                                </tbody>     
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7 col-sm-offset-5">
                            <?= LinkPager::widget(['pagination' => $pagination]) ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="box-footer clearfix no-border">
                
            </div>
        </div>

    </section>

</div>


<?php
// 添加JS片段到文件末尾
$js = <<< JS
    $(function () {
        console.log('hello world.');
    });
JS;

$this->registerJs($js);
?>