<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/adminlte.min.css',
        'css/skins/_all-skins.css',
        'iCheck/all.css',
        'css/site.css',
    ];
    public $js = [
        'bootstrap/js/bootstrap.min.js',
        'js/adminlte.min.js',
        'iCheck/icheck.min.js',
        'js/core.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
