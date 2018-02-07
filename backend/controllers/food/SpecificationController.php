<?php

namespace backend\controllers\food;

use Yii;
use backend\controllers\AcfController;
use backend\models\FoodspecForm;
use backend\models\FoodspecSearch;

/**
 * Site controller
 */
class SpecificationController extends AcfController
{
    public function actionIndex()
    {
        $searchModel = new FoodspecSearch();
        $query = $dataProvider->query;

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);

        $list = $query->orderBy('id asc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'list' => $list
        ]);
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