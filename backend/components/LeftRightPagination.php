<?php
namespace backend\components;

use yii\base\Widget;

class LeftRightPagination extends Widget
{
    public $pagination;

    public function run() 
    {
        if (empty($this->pagination)) {
            return '';
        }
        $start = 1;
        $offset = $this->pagination->getPageSize();
        if (!empty($_GET['page'])) {
          $page = $_GET['page'];
          $start = ($page - 1) * $offset + 1;
          $end = $start + $offset;
        } else {
          $end = $offset;
        }
        $total = $this->pagination->totalCount;
        if ($end > $total) {
            $end = $total;
        }
        $links = $this->pagination->getLinks();
        $hasNext = $hasPrev = false;
        $next = $prev = '#';
        if (!empty($links['next'])) {
            $next = $links['next'];
            $hasNext = true;
        }
        if (!empty($links['prev'])) {
            $prev = $links['prev'];
            $hasPrev = true;
        }
        return $this->render('left-right-pagination', [
            'start' => $start,
            'end' => $end,
            'total' => $total,
            'next' => $next,
            'prev' => $prev,
            'hasNext' => $hasNext,
            'hasPrev' => $hasPrev,
        ]);
    }
}