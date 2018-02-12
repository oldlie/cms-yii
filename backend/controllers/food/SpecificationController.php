<?php

namespace backend\controllers\food;

use Yii;
use backend\controllers\AcfController;
use backend\models\food\SpecificationForm;
use backend\models\food\SpecificationSearch;
use yii\data\Pagination;
use common\models\FoodSpec;

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

    public function actionAjaxList()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = Yii::$app->request;
        
        $query = FoodSpec::find();
        $query->andFilterWhere(['>', 'cargo_id', 0]);
        if ($name = $request->post('name') && $name != '') {
            $query->andFilterWhere(['like', 'name'], $name);
        }

        $page = $request->post('page');
        $start = 0; 
        $offset = 20;
        if (is_numeric($page)) {
            $start = ($page - 1) * $offset;
        }
        $list = $query->orderBy('id asc')
            ->offset($start)
            ->limit($offset)
            ->all();

        return ['status' => 1, 'list' => $list, 'total' => $query->count()];
    }

    public function actionCreate()
    {
        $model = new SpecificationForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('create', ['model' => $model, 'message' => '保存成功。']);
        }
        return $this->render('create', ['model' => $model, 'message' => '']);
    }

    public function actionDelete($id)
    {
        $model = FoodSpec::findOne($id);
        if ($model != null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    public function actionUpdate($id) 
    {
        $model = new SpecificationForm();
        if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
            return $this->render('update', ['model' => $model, 'message' => '保存成功。']);
        }
        $model->find($id);
        return $this->render('update', ['model' => $model, 'message' => '']);
    }

    public function actionAjaxList()
    {

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