<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use common\models\User;
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
        $model = new PostsForm();
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            Yii::trace('ajax save.');
            if ($model->load($request->post())){
                Yii::trace('ajax save load.');
                Yii::trace($request->post());
                yii::trace($request->post('PostsForm[content]'));
                $user = User::findOne(Yii::$app->user->id);
                if ($user) {
                    Yii::trace('ajax save: find user');
                    $model->author = $user->nickname;
                    $model->author_id = $user->id;
                    $model->status = 0;
                    if ($model->save()) {
                        Yii::trace('ajax save: save user');
                        return ['status' => 0, 'message' => '已保存。', 'id' => $model->id];
                    } else {
                        Yii::trace('ajax save: save user faild');
                        Yii::error($model->errors);
                        return ['status' => 0, 'message' => '保存文章失败。'];
                    }
                } else {
                    Yii::trace('Posts/AjaxSave:当前用户不存在。');
                }
            } else {
                return ['status' => 0, 'message' => '数据加载到模型失败。'];
            }
        }
        return $this->redirect(Url::to(['site/login']));
    }

    public function actionAjaxUpdate()
    {
        $model = new PostsForm();
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load($request->post())){
                if ($model->update($model->id)) {
                    return ['status' => 0, 'message' => '已保存。', 'id' => $model->id];
                } else {
                    return ['status' => 0, 'message' => '保存文章失败。'];
                }
            } else {
                return ['status' => 0, 'message' => '数据加载到模型失败。'];
            }
        }

        return $this->redirect(Url::to(['site/login']));
    }
}