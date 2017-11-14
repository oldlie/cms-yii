<?php

namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class MainSidebar extends Widget {

    public $active_menu;
    public $menu;

    public function init() {
        parent::init();

        $this->menu = [
            ['id' => 100, 'name' => '概览', 'icon' => 'fa fa-dashboard',  
                'url' => Url::to(['site/index']),
                'children' => [],
            ],
            ['id' => 200, 'name' => '用户与权限', 'icon' => 'fa fa fa-user-o', 'url' => '#',
                'children' => [
                    ['id' => 201, 'name' => '后台用户信息', 'url' => Url::to(['user/index'])],
                    ['id' => 202, 'name' => '新建用户账号', 'url' => Url::to(['user/create'])],   
                    ['id' => 203, 'name' => '客户信息', 'url' => Url::to(['customer/index'])], 
                    ['id' => 204, 'name' => '新建客户信息', 'url' => Url::to(['customer/create'])],
                    ['id' => 205, 'name' => '客户权限', 'url' => Url::to(['permission/frontend'])],
                ],
            ],
            ['id' => 300, 'name' => '品类与提货单', 'icon' => 'fa fa-opencart',  'url' => '#',
                'children' => [
                    ['id' => 301, 'name' => '品类列表', 'url' => Url::to(['cargo/index'])],
                    ['id' => 302, 'name' => '添加品类', 'url' => Url::to(['cargo/create'])],
                    ['id' => 303, 'name' => '货单管理', 'url' => Url::to(['order/index'])],
                    ['id' => 304, 'name' => '优惠券', 'url' => Url::to(['coupom/index'])],
                    ['id' => 305, 'name' => '优惠券详细', 'url' => Url::to(['coupom/detail'])],
                ]
            ],
            ['id' => 400, 'name' => '栏目与资讯', 'icon' => 'fa fa-navicon',  'url' => '#',
                'children' => [
                    ['id' => 401, 'name' => '栏目设置', 'url' => Url::to(['category/index'])],
                    ['id' => 402, 'name' => '增加栏目', 'url' => Url::to(['category/create'])],
                    ['id' => 403, 'name' => '文章列表', 'url' => Url::to(['news/index'])],
                    ['id' => 404, 'name' => '写文章', 'url' => Url::to(['news/compose'])],
                ]
            ],
            ['id' => 500, 'name' => '系统设置', 'icon' => 'fa fa-gears',  'url' => '#',
                'children' => [
                    ['id' => 501, 'name' => '媒体库', 'url' => Url::to(['category/index'])],
                    ['id' => 502, 'name' => '上传文件', 'url' => Url::to(['upload/index'])],
                ]
            ],
        ];
    }

    public function run() {
        return $this->render('main-sidebar', [
            'menu' => $this->menu,
            'active_menu' => $this->active_menu
        ]);
    }
}