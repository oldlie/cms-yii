<?php

namespace backend\controllers;

use Yii;
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

    public function actionView($id)
    {
        $model = new CargoForm();
        
    }

    public function actionCreate()
    {
        $model = new CargoForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } 
        return $this->render('create', ['model' => $model]);
    }
}
