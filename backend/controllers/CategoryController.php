<?php

namespace backend\controllers;

use Yii;
use yii\web\UploadedFile;
use backend\controllers\AcfController;
use backend\models\CategoryForm;

class CategoryController extends AcfController
{
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
}