<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use backend\controllers\AcfController;
use backend\models\CategoryForm;
use common\models\Navigation;
use backend\models\SystemSettingForm;

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
        $request = Yii::$app->request;
        $id = $request->get('id', 0);
        if ($id != 0) {
            $item = Navigation::findOne($id);  
        } else {
            $item = new Navigation();
            $item->id = 0;
            $item->parent = 0;
            $item->title = '根目录';
        }
        $list = Navigation::find()->where('parent=:id', [':id' => $id])->all();

        return $this->render('index', [
            'item' => $item,
            'list' => $list,
        ]);
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
            return $this->redirect(Url::to(['category/index']));
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    public function actionEdit() 
    { 
        $request = Yii::$app->request;
        $model = new CategoryForm();
        $tip = '';
        if ($request->isPost) {
            if ($model->load($request->post())) {
                if ($model->id === $model->parent) {
                    $tip = '上一级目录不能选择自己。';
                } else {
                    if (!$model->update()) {
                        $tip = '没有更新成功，请稍后再试。';
                    }
                }
            } else {
                $model->title = '数据没有被正确加载，请稍后再试。';
            }
        } else {
            $id = $request->get('id');
            $model->find($id);
        }
        return $this->render('edit', ['tip' => $tip, 'model' => $model]);
    }

    public function actionList()
    {
        $request = Yii::$app->request;
        $id = $request->post('id', 0);
        if ($id != 0) {
            $item = Navigation::findOne($id);  
        } else {
            $item = '';
        }
        $list = Navigation::find()->where('parent=:id', [':id' => $id])->all();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => 0,
            'item' => $item,
            'list' => $list
        ];
    }

    public function actionDelete()
    {
        $request = Yii::$app->request;
        $id = $request->get('id', 0);
        $model = Navigation::findOne($id);
        if ($model->child_count > 0) {
            return $this->render('delete', [
                'tip' => '[' . $model->title . ']还有子节点，因此不能被删除！如果需要删除，请先删除子节点。', 
                'parent' => $model->parent
            ]);
        } else {
            // TODO:
            // need to add condition if there is any post under this category.

            $setting = SystemSettingForm::getSetting();
            $image = $setting->upload_path . '/' . $model->image;
            if (file_exists($image)) {
                unlink($image);
            } 
            
            if ($model->delete()) {
                return $this->redirect(['index', ['id' => $model->parent]]);
            } else {
                return $this->render('delete', [
                    'tip' => '[' . $model->title . ']还有子节点，因此不能被删除！如果需要删除，请先删除子节点。', 
                    'parent' => $model->parent
                ]); 
            }
        }
        
    }
}