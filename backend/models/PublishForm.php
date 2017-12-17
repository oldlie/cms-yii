<?php
namespace backend\models;

use Yii;
use common\models\Posts;

class PublishForm extends \yii\base\Model
{
    public $id;
    public $title;
    public $categoryId;
    public $image;
    public $imageFile;
    public $allowComment;
}