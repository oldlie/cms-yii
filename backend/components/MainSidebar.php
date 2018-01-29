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
            ['id' => 100, 'name' => '概览', 'icon' => 'fa fa-dashboard',  'url' => '#',
                'children' => [
                    ['id' => 101, 'name' => '概览信息', 'url' => Url::to(['site/index'])],
                    ['id' => 102, 'name' => '网站信息', 'url' => Url::to(['site/setting'])],
                    ['id' => 103, 'name' => '首页设置', 'url' => Url::to(['site/front-index'])],
                ],
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
            [
                'id' => 600, 'name' => '标签', 'icon' => 'fa fa-tag', 'url' => '#', 'children' => [
                    ['id' => 601, 'name' => '标签列表', 'url' => Url::to(['tag/index', 'id' => 0])],
                    ['id' => 602, 'name' => '创建标签', 'url' => Url::to(['tag/create'])],
                ]
            ],
            ['id' => 300, 'name' => '商品', 'icon' => 'fa fa-opencart',  'url' => '#',
                'children' => [
                    ['id' => 301, 'name' => '商品列表', 'url' => Url::to(['cargo/index'])],
                    ['id' => 302, 'name' => '添加商品', 'url' => Url::to(['cargo/create'])],
                    ['id' => 303, 'name' => '食品规格列表', 'url' => Url::to(['foodspec/index'])],
                    ['id' => 304, 'name' => '添加食品规格', 'url' => Url::to(['foodspec/create'])],
                ]
            ],
            ['id' => 400, 'name' => '栏目与资讯', 'icon' => 'fa fa-navicon',  'url' => '#',
                'children' => [
                    ['id' => 401, 'name' => '栏目设置', 'url' => Url::to(['category/index'])],
                    ['id' => 402, 'name' => '增加栏目', 'url' => Url::to(['category/create'])],
                    ['id' => 403, 'name' => '文章列表', 'url' => Url::to(['posts/index'])],
                    ['id' => 404, 'name' => '写文章', 'url' => Url::to(['posts/compose'])],
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