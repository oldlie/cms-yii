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
            if ($model->load($request->post())){
                $user = User::findOne(Yii::$app->user->id);
                if ($user) {
                    $model->author = $user->nickname;
                    $model->author_id = $user->author_id;
                    if ($model->save()) {
                        return ['status' => 0, 'message' => '已保存。', 'id' => $model->id];
                    } else {
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

    }
}