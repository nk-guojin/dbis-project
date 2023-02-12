<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commentstatus".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 *
 * @property Comment[] $comments
 * @property Newscomment[] $newscomments
 */
class Commentstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commentstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['status' => 'id']);
    }

    /**
     * Gets query for [[Newscomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewscomments()
    {
        return $this->hasMany(Newscomment::className(), ['status' => 'id']);
    }
}
