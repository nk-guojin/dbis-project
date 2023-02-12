<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the poststatus of common model
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "poststatus".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 *
 * @property Post[] $posts
 */
class Poststatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poststatus';
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
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['status' => 'id']);
    }
}
