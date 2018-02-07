<?php

namespace backend\controllers;

// use \yii;
use Yii;
use backend\controllers\AcfController;
use backend\models\CargoForm;
use backend\models\CargoSearch;
use common\models\Cargo;
use yii\data\Pagination;
use yii\web\Request;


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
            'list' => $models,
            'message' => ''
        ]);
    }

    /**
     * @var common\models\Cargo $model
     */
    public function actionAjaxStatus()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            try {
                $idsStr = $request->post('ids');
                $status = $request->post('status');
                $ids = explode(',', $idsStr);
                
                $length = count($ids);
                if ($length > 0) {
                    $where = 'id=' . $ids[0];
                    for($i = 1; $i < $length; $i++) {
                        $where = $where . ' or id=' . $ids[$i] . ' ';
                    }
                    Yii::$app->db->createCommand(
                        'UPDATE cargo SET status=' . $status . ' WHERE ' . $where)
                        ->execute();
                    return ['status' => 1, 'message' => '更新成功。'];    
                } 
                return ['status' => 0, 'message' => '没找到要更新的商品，请刷新当前页面。'];
            } catch (Exception $e) {
                return ['status' => 0, 'message' => $e->getMessage()];
            }
            
            
        }
        return $this->redirect(Url::to(['site/login']));
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

    public function actionDelete($id)
    {
        $model = Cargo::findOne($id);
        if ($model != null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = new CargoForm();
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['index']);
        }  else if ($model->find($id)) {
            return $this->render('update', ['model' => $model]);
        } else {
            return $this->redirect(['create']);
        }
    }
}
