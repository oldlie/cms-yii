<?php
namespace backend\models;

use Yii;
use common\models\Posts;
use common\models\PostCategory;
use common\models\WebsiteSystem;
use common\models\Navigation;
use backend\models\SystemSettingForm;

class ArticlePublishForm extends PostsForm
{
    public function rules()
    {
        
    }

    

    public function attributeLabels()
    {
        return [
            'content' => '文章内容',
            'abstract' => '文章摘要',
            'comment_status' => '是否开启评论',
        ];
    }
}