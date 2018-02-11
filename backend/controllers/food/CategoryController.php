<?php

namespace backend\controllers\food;

use Yii;
use backend\controllers\AcfController;
use backend\models\FoodspecForm;
use backend\models\FoodspecSearch;
use common\models\FoodCategory;
use backend\models\food\CategoryForm;
use backend\models\CategorySearch;
use yii\data\Pagination;

/**
 * Food Category controller
 */
class CategoryController extends AcfController
{
    public function actionIndex($message = '')
    {
        $searchModel = new CategorySearch();
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
            'list' => $list,
            'message' => $message,
        ]);
    }

    public function actionAjaxCreate($parent, $child)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new CategoryForm();
        if ($model->load(yii::$app->request->post()) && $model->save()) {
            return ['status' => 1, 'message' => '已添加。'];
        }
        return ['status' => 0, 'message' => '没有正确的添加分类，请稍候再试。'];
    }

    public function actionAjaxDelete($id)
    {
        
    }

    public function actionCreate()
    {
        $model = new CategoryForm();
        if ($model->load(yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
        return $this->render('create');
    }

    public function actionDelete($id)
    {
        if ($model = FoodCategory::findOne($id) != null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = new CategoryForm();
        if ($model->load(yii::$app->request->post()) && $model->update()) {
            $status = 1;
            $message = '更新已保存。';
        } else {
            $status = 0;
            $message = '更新未保存。';
        }
        return $this->render('update', ['status' => $status, 'message' => $message]);
    }
}