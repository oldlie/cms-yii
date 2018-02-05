<?php

namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;
use backend\models\CargoForm;
use backend\models\FoodspecForm;

/**
 * Site controller
 */
class FoodspecController extends AcfController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new FoodspecForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model->findModel($id)->delete();
        return $this->render(['index']);
    }

    public function actionUpdate($id) {
        $model = new FoodspecForm();
        if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
            return $this->redirect(['index']);
        }
        return $this->render('update', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = FoodSpec::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}