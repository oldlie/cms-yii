<?php
use yii\helpers\Url;
use backend\components\MainSidebar;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="content-wrapper" >

    <?= MainSidebar::widget(['active_menu' => 401]); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-md-6">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">栏目</h3>
                    </div>
                    <div class="box-body">
                        <div id="categoryListPanel">
                            <div class="btn-group" style="width:100%;">
                                <?php
                                    echo '<a href="' . Url::to(['index', 'id' => $item['parent']]) . '" class="btn btn-default" style="width:358px;">'. $item['title'] .'</a>';
                                    foreach( $list as $it ) {
                                        echo 
                                        '<div class="btn-group">' .
                                        '<a href="' . Url::to(['index', 'id' => $it['id']]) . '" class="btn btn-default item-btn">' . $it['title'] . '</a>' .
                                        '<a href="' . Url::to(['edit', 'id' => $it['id']]) . '" class="btn btn-default dropdown-toggle child-btn" >' .
                                        '<span class="fa fa-edit"></span><span class="sr-only">Edit</span> ' .
                                        '</a>' .
                                        '<a href="' . Url::to(['delete', 'id' => $it['id']]) . '" class="btn btn-default dropdown-toggle child-btn" >' .
                                        '<span class="fa fa-trash-o"></span><span class="sr-only">Remove</span> ' .
                                        '</a></div>'
                                        ;
                                    }
                                ?>
                            </div>
                        </div><!--category list panel-->
                    </div><!-- ./box-body -->
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>

</div>
