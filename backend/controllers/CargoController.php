<?php

namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;
use backend\models\CargoForm;
use backend\models\CargoSearch;


/**
 * Site controller
 */
class CargoController extends AcfController
{
    public function actionIndex()
    {
        $searchModel = new CargoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = $dataProvider->query;

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);

        $models = $query->orderBy('id asc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        
        return $this->render('index', [
            'pagination' => $pagination,
            'list' => $models
        ]);
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

    public function actionUpdate()
    {
        $model = new CargoForm();
        Yii::trace('');
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['index']);
        } 

        return $this->render('update', ['model' => $model]);
    }
}
