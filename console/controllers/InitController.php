<?php

namespace console\controllers;  
use common\models\User;
use backend\models\SystemSettingForm;
use common\models\WebsiteSystem;

class InitController extends \yii\console\Controller  
{  
    /** 
     * Create init user 
     */  
    public function actionAdmin()  
    {  
        // yii migrate --migrationPath=@yii/rbac/migrations
        echo "创建一个新用户 ...\n";                  // 提示当前操作  
        $username = $this->prompt('User Name:');        // 接收用户名  
        $email = $this->prompt('Email:');               // 接收Email  
        $password = $this->prompt('Password:');         // 接收密码  
        $model = new User();                            // 创建一个新用户  
        $model->username = $username;                   // 完成赋值  
        $model->email = $email;  
        $model->password = $password;
        $model->auth_key = $model->generateAuthKey();
        
        if (!$model->save())                            // 保存新的用户  
        {  
            foreach ($model->getErrors() as $error)     // 如果保存失败，说明有错误，那就输出错误信息。  
            {  
                foreach ($error as $e)  
                {  
                    echo "$e\n";  
                }  
            }  
            return 1;                                   // 命令行返回1表示有异常  
        }  
        return 0;                                       // 返回0表示一切OK  
    }

    public function actionSystem()
    {
        echo '配置网站...\n';
        $website_name = $this->prompt('网站名称');
        $website_summary = $this->prompt('网站简介');
        $website_keys = $this->prompt('网站关键词');
        $icp = $this->prompt('网站 ICP 备案号');
        $upload_url = $this->prompt('上传目录外部访问 URL 地址');
        $upload_path = $this->prompt('上传文件存放绝对路径');
        $static_path = $this->prompt('static 目录资源 URL 地址');

        $model = new WebsiteSystem();
        $model->website_name = $website_name;
        $model->website_summary = $website_summary;
        $model->website_keys = $website_keys;
        $model->icp = $icp;
        $model->upload_url = $upload_url;
        $model->upload_path = $upload_path;
        $model->satic_path = $static_path;
        $model->updated_at = time();
        $model->created_at = time();
        if (!$model->save())                            // 保存新的用户  
        {  
            foreach ($model->getErrors() as $error)     // 如果保存失败，说明有错误，那就输出错误信息。  
            {  
                foreach ($error as $e)  
                {  
                    echo "$e\n";  
                }  
            }  
            return 1;                                   // 命令行返回1表示有异常  
        }  
        return 0;                    
    }
} 