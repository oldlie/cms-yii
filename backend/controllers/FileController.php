<?php

namespace backend\controllers;

use Yii;
use backend\models\FileForm;
use yii\web\UploadedFile;

class FileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAjaxUploadImage()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new FileForm();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'image');
            if ($model->save()) {
                return ['status' => 1, 'message' => '已上传。', 'image' => $model->path];
            } else {
                return ['status' => 0, 'message' => $model->errors];
            }
        }
        return ['status' => 0, 'message' => '上传失败。'];
    }
}
