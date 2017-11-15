<?php

namespace backend\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\controllers\AcfController;
use backend\models\CategoryForm;
use common\models\Navigation;

class CategoryController extends AcfController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'list' => ['POST'],
            ]
        ];
        // Yii::error($behaviors);
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new CategoryForm();
        // print_r($model);
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()))
        {
            Yii::error('post');
            $model->image = UploadedFile::getInstance($model, 'image');
            $ret = $model->save();
            print_r($ret . '_xxx');
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionList()
    {
        $request = Yii::$app->request;
        $id = $request->post('id', 0);
        $list = Navigation::find()->where('parent=:id', [':id' => $id])->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        /*
        $temp = [];
        foreach($list as $item) {
            $temp[] = ['id' => $item['id'], 'title' => $item['title']];
        }
        */
        return [
            'status' => 0,
            'list' => $list
        ];
    }
}