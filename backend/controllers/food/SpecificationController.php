<?php

namespace backend\controllers\food;

use Yii;
use backend\controllers\AcfController;
use backend\models\food\SpecificationForm;
use backend\models\food\SpecificationSearch;
use yii\data\Pagination;

/**
 * Site controller
 */
class SpecificationController extends AcfController
{
    public function actionIndex()
    {
        $searchModel = new SpecificationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        $model = new SpecificationForm();
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

    public function actionUpdate($id, $message = '') {
        $model = new SpecificationForm();
        if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
            return $this->redirect(['update', $message]);
        }
        $model->find($id);
        return $this->render('update', ['model' => $model, 'message' => $message]);
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