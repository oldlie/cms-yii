<?php

namespace backend\models;

use Yii;
use common\models\User;

class UserForm extends \yii\base\Model
{
    public $id;
    public $username;
    public $nickname;
    public $password;
    public $email;

    public function rules() 
    {
        return [
            ['username', 'required', 'message' => '必须填写用户名称。'],
            [['password', 'nickname'], 'default'],
            ['email', 'email', 'message' => '邮箱地址格式不正确。']
        ];
    }

    public function find($id) 
    {
        if (($model = User::findOne($id)) !== null) 
        {
            $this->id = $model->id;
            $this->username = $model->username;
            $this->nickname = $model->nickname;
            $this->email = $model->email;
            return true;
        }
        return false;
    }

    public function update($id)
    {
        if (($model = User::findOne($id)) !== null)
        {
            $this->id = $model->id;
            $model->username = $this->username;
            if (empty($this->nickname)) {
                $model->nickname = $model->username;
            } else {
                $model->nickname = $this->nickname;
            }
            if ($this->password != '')
            {
                $model->password = $this->password;            
            }
            $model->email = $this->email;
            return $model->save();
        } else {
            return false;
        } 
    }

    public function save()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            if (empty($this->nickname)) {
                $user->nickname = $user->username;
            } else {
                $user->nickname = $this->nickname;
            }
            if (empty($this->password)){
                $user->password = $this->password;            
            }
            $user->email = $this->email;
            $user->auth_key = Yii::$app->security->generateRandomString();
            if ($user->save()) {
                $this->id = $user->id;
                $auth = Yii::$app->authManager;
                $adminRole = $auth->getRole('admin');
                $auth->assign($adminRole, $this->id);
                return true;
            }
        }
        
        return false;
    }
}