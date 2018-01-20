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
use backend\models\TagForm;
use common\models\TagModel;

class TagController extends \yii\web\Controller
{
    public function actionIndex($id = 0, $message = null)
    {
        $tag = new TagModel();
        if ($id == 0) {
            $current = $tag;
            $current->id = 0;
            $current->t_text = '根标签';
        } else {
            $current = TagModel::findOne($id);
        }
        $all = $tag->find()->orderBy('id desc')->all();
        return $this->render('index', [
            'message' => $message,
            'current' => $current,
            'list' => $all
        ]);
    }

    public function actionCreate()
    {
        $model = new TagForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::to(['tag/index']));
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = new TagForm();
        if ($model->load(Yii::$app->request->post()) && $model->update($id)) {
            return $this->redirect(Url::to(['tag/index']));
        } else {
            $model->find($id);
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $message = null;
        $model = new TagForm();
        if ($model->delete($id)) {
            return $this->redirect(Url::to([
                'tag/index',
                'id' => $model->parent_id
            ]));
        }
        return $this->redirect(Url::to([
            'tag/index',
            'id' => $model->parent_id,
            'message' => implode(';', $model->errors)
        ]));
    }

    public function actionAjaxListTag($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $models = TagModel::find()->where(['parent_id' => $id])->orderBy('id desc')->all();
        return ['status' => 1, 'list' => $models];
    }
}
