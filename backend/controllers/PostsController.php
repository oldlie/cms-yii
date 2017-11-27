<?php
namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;
use backend\models\PostsForm;

class PostsController extends AcfController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCompose()
    {
        $model = new PostsForm();
        $model->title = '';
        $model->slug = '';
        return $this->render('compose', ['model' => $model]);
    }
}