<?php
namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;

class TempController extends AcfController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}