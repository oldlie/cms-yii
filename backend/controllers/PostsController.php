<?php
namespace backend\controllers;

use Yii;
use backend\controllers\AcfController;
use backend\models\PostsForm;
use backend\models\SystemSettingForm;

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
        $setting = SystemSettingForm::getSetting();
        return $this->render('compose', ['url' => $setting['upload_url'], 'model' => $model]);
    }

    public function actionAjaxSave()
    {

    }

    public function actionAjaxUpdate()
    {

    }
}