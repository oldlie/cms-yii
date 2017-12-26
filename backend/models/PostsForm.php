<?php
namespace backend\models;

use Yii;
use common\models\Posts;
use common\models\WebsiteSystem;
use common\models\Navigation;
use backend\models\SystemSettingForm;

class PostsForm extends \yii\base\Model
{
    public $id;
    public $title;
    public $slug;
    public $author;
    public $author_id;
    public $publisher;
    public $publisher_id;
    public $editor;
    public $editor_id;
    public $image;
    public $imageFile;
    public $content;
    public $status;
    public $comment_status;
    public $category;

    public function rules()
    {
        return [
            [['id', 'author_id', 'publisher_id', 'editor_id', 'category'], 'integer', 'message' => '不是整型'],
            [['title', 'slug'], 'required', 'message' => '请填入值。'],
            [['content'], 'string', 'message' => 'string'],
            [['title', 'slug', 'image'], 'string', 'max' => 255, 'message' => 'string 255'],
            [['author', 'publisher', 'editor'], 'string', 'max' => 32, 'message' => 'string32'],
            [['author_id', 'publisher_id', 'editor_id', 'status', 'comment_status'], 'integer', 'message' => 'integer'],
            [['status', 'comment_status'], 'default', 'value' => 0]
        ];
    }

    public function find($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            $this->id = $model->id;
            $this->title = $model->title;
            $this->slug = $model->slug;
            $this->author = $model->author;
            $this->author_id = $model->author_id;
            $this->publisher = $model->publisher;
            $this->publisher_id = $model->publisher_id;
            $this->editor = $model->editor;
            $this->editor_id = $model->editor_id;
            $this->image = $model->image;
            $this->content = $model->content;
            $this->status = $model->status;
            $this->comment_status = $model->comment_status;
            return true;
        }
        return false;
    }

    public function update($id)
    {
        if ($this->validate()) {
            if (($model = Posts::findOne($id)) !== null) {
                $model->title = $this->title;
                $model->slug = $this->slug;
                $model->image = $this->image;
                $model->content = $this->content;
                $model->status = $this->status;
                $model->comment_status = $this->comment_status;
                return $model->save();
            }
        }
        return false;
    }

    public function save()
    {
        if ($this->validate()) {
            Yii::trace('validated.');
            $model = new Posts();
            $model->title = $this->title;
            $model->slug = $this->slug;
            $model->author = $this->author;
            $model->author_id = $this->author_id;
            $model->publisher = $this->publisher;
            $model->publisher_id = $this->publisher_id;
            $model->editor = $this->editor;
            $model->editor_id = $this->editor_id;
            $model->image = $this->image;
            $model->content = $this->content;
            $model->status = $this->status;
            $model->comment_status = $this->comment_status;
            $model->created_at = time();
            $model->updated_at = time();
            Yii::trace('prepare save.');
            if ($model->save()) {
                $this->id = $model->id;
                return true;
            }
        } else {
            Yii::error($model->errors);
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'comment_status' => '是否开启评论',
        ];
    }
}