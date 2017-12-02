<?php
use yii\helpers\Url;
use backend\components\MainSidebar;
use backend\components\LeftRightPagination;
use backend\components\listpanel\ListPanel;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$folderList = [
  ['id' => 1, 'icon' => 'fa fa-pencil-square-o', 'text' => '草稿箱', 'url' => Url::to(['posts/index'])] ,
  ['id' => 2, 'icon' => 'fa fa-newspaper-o', 'text' => '已发布', 'url' => Url::to(['posts/published'])] ,
];
$activeId = 1;
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 403]); ?>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">写文章</a>

          <?= ListPanel::widget(['title' => '文件夹', 
            'list' => $folderList,
            'activeId' => $activeId,
          ]); ?>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$title?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="按标题查找">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square-o"></i>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
                <!-- /.btn-group -->
                
                <div class="pull-right">
                  <?= LeftRightPagination::widget(['pagination' => $pagination])?>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>作者</th>
                      <th>标题</th>
                      <th>更新时间</th>
                      <th>写作时间</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($models as $item) {
                      echo '<tr><td><input type="checkbox" data-value="' . $item['id'] . '"></td>' .
                      '<td class="mailbox-name"><a href="' . Url::to(['user/view', 'id' => $item['author_id']]) . '">' . $item['author'] . '</a></td>' .
                      '<td class="mailbox-subject"><a href="' . Url::to(['posts/view', 'id' => $item['id']]) . '">'. $item['title'] . '</td>' .
                      '<td class="mailbox-date">'. Yii::$app->formatter->asDate($item['updated_at'], 'yyyy-MM-dd HH:mm:ss') .'</td>' .
                      '<td class="mailbox-date">'. Yii::$app->formatter->asDate($item['created_at'], 'yyyy-MM-dd HH:mm:ss') .'</td></tr>';
                    }
                    ?>
                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
                <!-- /.btn-group -->
                <div class="pull-right">
                  <?= LeftRightPagination::widget(['pagination' => $pagination])?>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>

<?php
$this->registerJsFile('@web/js/vue.js');
$this->registerJsFile('@web/js/posts/index.js', ['depends' => 'backend\assets\AppAsset']);
?>