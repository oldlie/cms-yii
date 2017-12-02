<?= $start . '-' . $end . '/' . $total?> 
<div class="btn-group">
    <a class="btn btn-default btn-sm" <?= $hasPrev ? 'href="' . $prev . '"' : 'disabled="disabled"'?>>
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="btn btn-default btn-sm" <?= $hasNext ? 'href="' . $next . '"' : 'disabled="disabled"'?>><i class="fa fa-chevron-right"></i></a>
</div>