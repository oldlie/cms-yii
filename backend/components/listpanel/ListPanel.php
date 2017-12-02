<?php

namespace backend\components\listPanel;

use yii\base\Widget;

/**
 * List Panel Widget
 * 
 * @property string     $title      component name
 * @property array      $list       [['id':number, 'icon': string, 'text': string, 'url':string]]
 * @property integer    $activeId   selected item
 */
class ListPanel extends Widget 
{
    public $title;
    public $list;
    public $activeId;

    public function init() 
    {
        parent::init();
    }

    public function run() {
        return $this->render('list-panel', [
            'title' => $this->title,
            'list' => $this->list,
            'activeId' => $this->activeId,
        ]);
    }
}