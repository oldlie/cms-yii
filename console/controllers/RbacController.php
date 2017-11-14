<?php
namespace console\controllers;

use Yii;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $loginBackend = $auth->createPermission('loginBackend');
        $loginBackend->description = 'Only web manager can login backend';
        $auth->add($loginBackend);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $loginBackend);

        $auth->assign($admin, 1);
    }
}