<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
        'imageAllowExtensions'=>['jpg','png','gif'],
        'uploadDir' => '@webroot/path/to/uploadfolder',
        'uploadUrl' => '@web/path/to/uploadfolder',
        'lang' => 'zh_cn',
        'plugins' => ['clips', 'fontcolor','imagemanager']
    ],
];
