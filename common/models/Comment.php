<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int|null $create_time
 * @property int $userid
 * @property string $email
 * @property string|null $url
 * @property int $post_id
 *
 * @property Post $post
 * @property Commentstatus $status0
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'status', 'userid', 'email', 'post_id'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'userid', 'post_id'], 'integer'],
            [['email', 'url'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Commentstatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'userid' => 'Userid',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Commentstatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
