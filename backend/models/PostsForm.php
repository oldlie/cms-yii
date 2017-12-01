<?php
namespace backend\models;

use Yii;
use common\models\Posts;
use common\models\WebsiteSystem;
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

    public function rules()
    {
        return [
            [['id', 'author_id', 'publisher_id', 'editor_id'], 'integer'],
            [['title', 'slug'], 'required', 'message' => '请填入值。'],
            // [['author, publisher, editor, image, content'], 'default', 'value' => ''],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['status', 'comment_status'], 'default', 'value' => 0]
        ];
    }

    public function find($id)
    {
        if ( ($model = Posts::findOne($id)) !== null) {
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
            if (($model = Navigation::findOne($id)) !== null) {
                
                $model->title = $this->title;
                $model->slug = $this->slug;
                $model->author = $this->author;
                $model->author_id = $this->author_id;
                $model->publisher = $this->publisher;
                $model->publisher_id = $this->publisher_id;
                $model->editor = $this->editor;
                $model->editor_id = $this->editor_id;
                $model->image = SystemSettingForm::getImagePath($this->imageFile);
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
            /*
            $setting = SystemSettingForm::getSetting();

            if ($this->imageFile) {
                $path = date('Y') . '/' . date('m');
                $dir = $setting['upload_path'] . '/' . $path;
                if (!is_dir($dir)) {
                    mkdir($dir, '0777', true);
                }
                $this->image = $path . '/'
                    . substr($this->imageFile->baseName, 0, 10) . '_' . time()
                    . '.'
                    . $this->imageFile->extension;
                $this->imageFile->saveAs($setting['upload_path'] . '/' . $this->image);
            } else {
                $this->image = '';
            }
            */
            $model = new Posts();
            $model->title = $this->title;
            $model->slug = $this->slug;
            $model->author = $this->author;
            $model->author_id = $this->author_id;
            $model->publisher = $this->publisher;
            $model->publisher_id = $this->publisher_id;
            $model->editor = $this->editor;
            $model->editor_id = $this->editor_id;
            $model->image = SystemSettingForm::getImagePath($this->imageFile);
            $model->content = $this->content;
            $model->status = $this->status;
            $model->comment_status = $this->comment_status;
            $model->created_at = time();
            $model->updated_at = time();
            Yii::trace($this);
            Yii::trace($model);
            return $model->save();
        } else {
            Yii::trace($model->errors);
        }
        return false;
    }
}