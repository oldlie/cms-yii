<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SystemSettingForm;
use backend\controllers\AcfController;
use common\models\Carousel;
use common\models\TopCargo;

/**
 * Site controller
 */
class SiteController extends AcfController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        /*
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
        */
        $behaviors = parent::behaviors();
        $behaviors['access']['rules'] = [
            [
                'actions' => ['login', 'error', 'logout', ],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['admin'],
            ],
        ];
        $behaviors['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post'],
            ]
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->can('loginBackend')) {
                return $this->goHome();
            }
            return $this->render('login', [
                'model' => $model,
            ]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Syetem setting
     * 
     */
    public function actionSetting()
    {
        $model = new SystemSettingForm();
        
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post()) && $model->update();
        } else {
            $model->find();
        }
        
        return $this->render('system_setting', ['model' => $model]);
        
    }

    /**
     * 前台首页设置
     */
    public function actionFrontIndex()
    {
        return $this->render('front_index');
    }

    public function actionAjaxSetCarousel($id, $sequence, $title, $image_url, $url)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $carousel = new Carousel();
        if ($id) {
            $carousel = Carousel::findOne($id);
        } 
        if ($carousel == null) {
            return ['status' => 0, 'message' => '更新轮播图出错了，可能因为这个图片已经删掉了。'];
        }
        $carousel->seq = $sequence;
        $carousel->title = $title;
        $carousel->image_url = $image_url;
        $carousel->url = $url;
        return $carousel->save() ?
         ['status' => 1, 'message' => '设置轮播图成功。'] : 
         ['status' => 0, 'message' => '没有正确的设置轮播图。'] ;
    }

    public function actionAjaxRemoveCarousel($id) 
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $carousel = Carousel::findOne($id);
        if ($carousel) {
            $carousel->delete();
        }
        return ['status' => 1, 'message' => '删除轮播图了。'];
    }

    public function actionAjaxSetCargo($id, $sequence, $cargo_id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $cargo = new TopCargo();
        if ($id) {
            $cargo = TopCargo::findOne($id);
        } 
        if ($cargo == null) {
            return ['status' => 0, 'message' => '设置商品出现了错误。'];
        }
        $cargo->seq = $sequence;
        $cargo->cargo_id = $cargo_id;
        return $cargo->save() ?
        ['status' => 1, 'message' => '商品设置好了。'] :
        ['status' => 0, 'message' => '设置商品出现了错误。'];
    }

    public function actionAjaxRemoveCargo($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $cargo = TopCargo::findOne($id);
        if ($cargo) {
            $cargo->delete();
        }
        return ['status' => 0, 'message' => '删除商品出现了错误。'];
    }

    public function actionUpdateAboutUs($content)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status' => 0, 'message' => '更新简介出现了错误。'];
    }
}
