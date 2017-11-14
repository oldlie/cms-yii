<?php
namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;

class PostsController extends AcfController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}