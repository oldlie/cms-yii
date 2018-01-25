<?php

namespace backend\controllers;

use backend\controllers\AcfController;
use backend\models\CargoForm;

/**
 * Site controller
 */
class CargoController extends AcfController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new CargoForm();
        return $this->render('create', ['model' => $model]);
    }
}
