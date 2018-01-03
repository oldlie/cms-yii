<?php

/**
 *                  ___====-_  _-====___
 *            _--^^^#####//      \\#####^^^--_
 *         _-^##########// (    ) \\##########^-_
 *        -############//  |\^^/|  \\############-
 *      _/############//   (@::@)   \\############\_
 *     /#############((     \\//     ))#############\
 *    -###############\\    (oo)    //###############-
 *   -#################\\  / VV \  //#################-
 *  -###################\\/      \//###################-
 * _#/|##########/\######(   /\   )######/\##########|\#_
 * |/ |#/\#/\#/\/  \#/\##\  |  |  /##/\#/  \/\#/\#/\#| \|
 * `  |/  V  V  `   V  \#\| |  | |/#/  V   '  V  V  \|  '
 *    `   `  `      `   / | |  | | \   '      '  '   '
 *                     (  | |  | |  )
 *                    __\ | |  | | /__
 *                   (vvv(VVV)(VVV)vvv)                
 *                        神兽保佑
 *                       代码无BUG!
 */
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
use common\models\User;
use common\models\Posts;
use backend\controllers\AcfController;
use backend\models\PostsForm;
use backend\models\PostsSearch;
use backend\models\SystemSettingForm;
use backend\models\PublishForm;
use backend\models\PostsImageUploadForm;

class PostsController extends AcfController
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $postsSearch = new PostsSearch();
        $dataProvider = $postsSearch->searchDraft($request->post());

        return $this->render('index', [
            'activeId' => 1,
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->getPagination()
        ]);
    }

    public function actionPublished()
    {
        $request = Yii::$app->request;
        $postsSearch = new PostsSearch();
        $dataProvider = $postsSearch->searchPublished($request->post());

        return $this->render('index', [
            'activeId' => 2,
            'models' => $dataProvider->getModels(),
            'pagination' => $dataProvider->getPagination()
        ]);
    }

    public function actionCompose()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $model = new PostsForm();
        if ($id) {
            $model->find($id);
        } else {
            $model->title = '';
            $model->slug = '';
        }
        $setting = SystemSettingForm::getSetting();
        return $this->render('compose', ['url' => $setting['upload_url'], 
        'model' => $model]);
    }

    public function actionAjaxSave()
    {
        $model = new PostsForm();
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->load($request->post(), 'PostsForm')) {
                Yii::trace($request->post());
                Yii::trace($model);
                $user = User::findOne(Yii::$app->user->id);
                if ($user) {
                    Yii::trace('ajax save: find user');
                    $model->author = $user->nickname;
                    $model->author_id = $user->id;
                    if ($model->save()) {
                        return ['status' => 1, 'message' => '已保存。', 'id' => $model->id];
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

            if ($model->load($request->post())) {
                if ($model->update($model->id)) {
                    return ['status' => 0, 'message' => '已保存。', 'id' => $model->id];
                } else {
                    return ['status' => 0, 'message' => '保存文章失败:' . implode(';', $model->errors)];
                }
            } else {
                return ['status' => 0, 'message' => '数据加载到模型失败。'];
            }
        }

        return $this->redirect(Url::to(['site/login']));
    }

    public function actionAjaxDeleteDraft()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $id = $request->post('id');
            if ($id) {
                $model = Posts::findOne($id);
                if ($model) {
                    if ($model->delete()) {
                        return ['status' => 1, 'message' => '已删除。'];
                    }
                }
            }

            return ['status' => 0, 'message' => '没有找到要删除的文章，刷新列表试试。'];
        }

        return $this->redirect(Url::to(['site/login']));
    }

    public function actionPublish()
    {
        $model = new PostsForm();
        if ($model->load(Yii::$app->request->post()) && $model->publish()) {
            // posts/published
            $model->find($model->id);
            $model->status = 1;
            if ($model->update($model->id)) {
                return $this->redirect(Url::to(['posts/published']));
            }
        }
        return $this->redirect(Url::to(['posts/index']));
    }

    public function actionAjaxUploadImage()
    {
        $model = new PostsImageUploadForm();
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->id = Yii::$app->request->post('id');
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->save()) {
                return ['status' => 1, 'message' => '已上传。', 'image' => $model->imagePath];
            } else {
                return ['status' => 0, 'message' => $model->errors];
            }
        }
        return ['status' => 0, 'message' => '上传失败。'];
    }
}