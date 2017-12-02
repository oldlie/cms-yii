<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$title?></h3>

        <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php
            foreach ($list as $item) {
                $active = $item['id'] === $activeId ? ' class="active"' : '';
                echo '<li '. $active .'>' .
                '<a href="' . $item['url'] . '">' .
                '<i class="' . $item['icon'] . '"></i> ' . $item['text'] . '</a></li>';
            }
            ?>
        </ul>
    </div>
<!-- /.box-body -->
</div>
<!-- /. box -->