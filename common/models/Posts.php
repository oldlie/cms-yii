<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $author
 * @property integer $author_id
 * @property string $publisher
 * @property integer $publisher_id
 * @property string $editor
 * @property integer $editor_id
 * @property string $image
 * @property string $content
 * @property integer $status
 * @property integer $comment_status
 * @property string $publish_date
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $created_at
 * @property integer $updated_at
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['author_id', 'publisher_id', 'editor_id', 'status', 'comment_status', 'view_count', 'like_count', 'created_at', 'updated_at'], 'integer'],
            [['publish_date'], 'safe'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
            [['author', 'publisher', 'editor'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'author' => 'Author',
            'author_id' => 'AuthorId',
            'publisher' => 'Publisher',
            'publisher_id' => 'PublisherId',
            'editor' => 'Editor',
            'editor_id' => 'EditorId',
            'image' => 'Image',
            'content' => 'Content',
            'status' => 'Status',
            'comment_status' => 'Comment Status',
            'publish_date' => 'Publish Date',
            'view_count' => 'View Count',
            'like_count' => 'Like Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
