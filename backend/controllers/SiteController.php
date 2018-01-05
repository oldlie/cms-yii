<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SystemSettingForm;
use backend\controllers\AcfController;

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
}
